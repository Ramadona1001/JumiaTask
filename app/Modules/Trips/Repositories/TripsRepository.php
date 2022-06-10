<?php


namespace Trips\Repositories;

use Trips\Models\Trips;
use File;
use Stations\Models\Stations;

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
