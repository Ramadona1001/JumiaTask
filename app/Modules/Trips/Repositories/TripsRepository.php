<?php


namespace Trips\Repositories;

use Trips\Models\Trips;
use File;
use Stations\Models\Stations;
use Trips\Models\Seats;
use DB;

class TripsRepository implements TripsRepositoryInterface
{
    public function allData(){
        return Trips::all();
    }

    public function getDataId($id){
        return Trips::where('id',$id)->first();
    }

    public function saveData($request,$id = null)
    {
        if ($id == null) {
            $trips = new Trips();
        }else{
            $trips = $this->getDataId($id);
        }
        $trips->from = $request->from;
        $trips->to = $request->to;
        $trips->cross = json_encode($request->cross);
        $trips->save();

        $cross = [];
        $cross = $request->cross;

        array_unshift($cross,$request->from);
        $cross[] = $trips->to;

        for ($i=0; $i < 12; $i++) {
            for ($j=1; $j < count($cross); $j++) {
                $seats = new Seats();
                $seats->trip = $trips->id;
                $seats->from = $cross[$j-1];
                $seats->to = $cross[$j];
                $seats->save();
            }
        }

    }

    public function seatsByStation($trip)
    {
        return Seats::select('from','to',\DB::raw('count(*)'))
                    ->where('trip',$trip->id)
                    ->groupBy('from')
                    ->get();
    }

    public function seats($trip)
    {
        return Seats::where('trip',$trip->id)->get();
    }

    public function deleteData($id)
    {
        $trips = Trips::findOrfail($id);
        $trips->delete();
    }

    public function stations()
    {
        return Stations::all();
    }

    public function getStations($ids)
    {
        if (is_array($ids)) {
            return Stations::whereNotIn('id',$ids)->get();
        }else{
            return Stations::where('id','!=',$ids)->get();
        }
    }
}
