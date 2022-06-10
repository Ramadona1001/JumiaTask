<?php

namespace Trips\Controllers;

use App\Http\Controllers\Controller;
use Trips\Repositories\TripsRepository;
use Trips\Requests\TripsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TripsController extends Controller
{
    public $path;
    private $tripsRepository;

    public function __construct(TripsRepository $tripsRepository)
    {
        $this->middleware('auth');
        $this->path = 'Trips::';
        $this->tripsRepository = $tripsRepository;
    }

    public function index()
    {
        hasPermissions('show_trips');
        $title = 'Trips';
        $pages = [
            ['Trips','trips']
        ];
        $trips = $this->tripsRepository->allData();
        return view($this->path.'index',compact('trips','pages','title'));
    }

    public function create()
    {
        hasPermissions('create_trips');
        $title = 'Create Trips';
        $pages = [
            ['All Trips','trips'],
            ['Create Trips','create_trips']
        ];
        $stations = $this->tripsRepository->stations();
        return view($this->path.'create',compact('pages','title','stations'));
    }

    public function getStation(Request $request)
    {
        $stations = $this->tripsRepository->getStations($request->stations);
        return response()->json($stations,200);
    }

    public function getSeats($id)
    {
        $title = 'Create Trips';
        $pages = [
            ['All Trips','trips'],
            ['Create Trips','create_trips']
        ];
        $trips = $this->tripsRepository->getDataId($id);
        $seatsByStation = $this->tripsRepository->seatsByStation($trips);
        $seats = $this->tripsRepository->seats($trips);
        return view($this->path.'seats',compact('pages','title','trips','seatsByStation','seats'));
    }

    public function bookSeats(Request $request)
    {
        $this->tripsRepository->bookSeats($request);
        return back()->with('success','');
    }

    public function store(Request $request)
    {
        hasPermissions('create_trips');
        $errors = [];
        $from = $request->from;
        $to = $request->to;
        $cross = $request->cross;
        if ($request->from == $request->to) {
            $errors[] = 'From Station Should be different from To Station';
        }
        if (count($request->cross) !== count(array_unique($request->cross))) {
            $errors[] = 'Cross Station Should be different';
        }
        if (count($errors) > 0) {
            return redirect()->back()->withErrors(['errors' => $errors]);
        }else{
            $this->tripsRepository->saveData($request,null);
            return redirect()->route('trips')->with('success','');
        }
    }

    public function show($id)
    {
        hasPermissions('show_trips');
        $id = Crypt::decrypt($id);
        $trips = $this->tripsRepository->getDataId($id);

        $title = 'Show Trips Details';
        $pages = [
            ['Trips','trips'],
        ];
        return view($this->path.'.show',compact('trips','title','pages'));
    }

    public function edit($id)
    {
        hasPermissions('update_trips');
        $id = Crypt::decrypt($id);
        $trips = $this->tripsRepository->getDataId($id);

        $title = 'Edit Trips Data';
        $pages = [
            ['Trips','trips'],
        ];
        return view($this->path.'.edit',compact('trips','title','pages'));
    }

    public function update(TripsRequest $request,$id)
    {
        hasPermissions('update_trips');
        $id = Crypt::decrypt($id);
        $this->tripsRepository->saveData($request,$id);
        return redirect()->route('trips')->with('success','');
    }

    public function destroy($id){
        hasPermissions('delete_trips');
        $id = Crypt::decrypt($id);
        $this->tripsRepository->deleteData($id);
        return back()->with('success','');
    }
}
