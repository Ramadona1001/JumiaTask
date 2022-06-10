<?php


namespace Stations\Repositories;

use Stations\Models\Stations;
use File;

class StationsRepository implements StationsRepositoryInterface
{
    public function allData(){
        return Stations::all();
    }

    public function getDataId($id){
        return Stations::where('id',$id)->first();
    }

    public function saveData($request,$id = null)
    {
        if ($id == null) {
            $station = new Stations();
        }else{
            $station = $this->getDataId($id);
        }
        $station->title = $request->title;
        $station->content = $request->content;
        $station->save();
    }

    public function deleteData($id)
    {
        $station = Stations::findOrfail($id);
        $station->delete();
    }
}
