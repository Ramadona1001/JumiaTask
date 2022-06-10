<?php

namespace Stations\Controllers;

use App\Http\Controllers\Controller;
use Stations\Repositories\StationsRepository;
use Stations\Requests\StationsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class StationsController extends Controller
{
    public $path;
    private $stationsRepository;

    public function __construct(StationsRepository $stationsRepository)
    {
        $this->middleware('auth');
        $this->path = 'Stations::';
        $this->stationsRepository = $stationsRepository;
    }

    public function index()
    {
        hasPermissions('show_stations');
        $title = 'Stations';
        $pages = [
            ['Stations','stations']
        ];
        $stations = $this->stationsRepository->allData();
        return view($this->path.'index',compact('stations','pages','title'));
    }

    public function create()
    {
        hasPermissions('create_stations');
        $title = 'Create Stations';
        $pages = [
            ['All Stations','stations'],
            ['Create Stations','create_stations']
        ];
        return view($this->path.'create',compact('pages','title'));
    }

    public function store(StationsRequest $request)
    {
        hasPermissions('create_stations');
        $this->stationsRepository->saveData($request,null);
        return redirect()->route('stations')->with('success','');
    }

    public function show($id)
    {
        hasPermissions('show_stations');
        $id = Crypt::decrypt($id);
        $stations = $this->stationsRepository->getDataId($id);

        $title = 'Show Stations Details';
        $pages = [
            ['Stations','stations'],
        ];
        return view($this->path.'.show',compact('stations','title','pages'));
    }

    public function edit($id)
    {
        hasPermissions('update_stations');
        $id = Crypt::decrypt($id);
        $stations = $this->stationsRepository->getDataId($id);

        $title = 'Edit Stations Data';
        $pages = [
            ['Stations','stations'],
        ];
        return view($this->path.'.edit',compact('stations','title','pages'));
    }

    public function update(StationsRequest $request,$id)
    {
        hasPermissions('update_stations');
        $id = Crypt::decrypt($id);
        $this->stationsRepository->saveData($request,$id);
        return redirect()->route('stations')->with('success','');
    }

    public function destroy($id){
        hasPermissions('delete_stations');
        $id = Crypt::decrypt($id);
        $this->stationsRepository->deleteData($id);
        return back()->with('success','');
    }
}
