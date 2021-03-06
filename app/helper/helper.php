<?php

use Spatie\Permission\Models\Permission;
use Stations\Models\Stations;
use Trips\Models\Booking;

function statisticsWidget($data){
    $statisticsHtml = '';
    for ($i=0; $i < count($data); $i++) {
        ($data[$i][3] == '') ? $data[$i][3] = 'azura' : $data[$i][3] = $data[$i][3];
        $statisticsHtml .= '
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-'.$data[$i][3].'">
                        <i class="fas fa-'.$data[$i][2].'"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>'.$data[$i][1].'</h4>
                        </div>
                        <div class="card-body">
                        '.$data[$i][0].'
                        </div>
                    </div>
                </div>
            </div>

            ';

    }
    return $statisticsHtml;
}

function breadcrumbWidget($currentPageName,$pages){
    $breadcrumb = '';
    if (count($pages) == 0) {
        $breadcrumb = '<h1>'.$currentPageName.'</h1>';
    }else{
        $breadcrumb .= '
        <h1>'.$currentPageName.'</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">';
            $breadcrumb .= '<li class="breadcrumb-item"><a href="'.route("home").'">'.transWord('Home').'</a></li>';
            for ($i=0; $i < count($pages); $i++) {
                if ($pages[$i][1] == '' || $pages[$i][1] == '#') {
                    $breadcrumb .= '<li class="breadcrumb-item"><a href="">'.$pages[$i][0].'</a></li>';
                }else if(is_array($pages[$i][1])){
                    $breadcrumb .= '<li class="breadcrumb-item"><a href="'.route($pages[$i][1][0],$pages[$i][1][1]).'">'.$pages[$i][0].'</a></li>';
                }else{
                    $breadcrumb .= '<li class="breadcrumb-item"><a href="'.route($pages[$i][1]).'">'.$pages[$i][0].'</a></li>';
                }
            }
            $breadcrumb .= '</ol>
        </nav>
        ';
    }
    return $breadcrumb;
}

function menuActive($name,$arrange){
    if(request()->segment($arrange) == $name){
        return "active";
    }
}

function getUserRole($userId){
    $user = \App\User::findOrfail($userId);
    $roles = [];
    foreach ($user->getRoleNames() as $role) {
        array_push($roles,$role);
    }
    return $roles;
}

function getUserData($userId){
    $user = \App\User::findOrfail($userId);
    if ($user != null) {
        return $user;
    }else{
        return 'Not User';
    }
}

function convertToTags($text){
    if(strpos($text,",") != null){
        $tags = explode(',',$text);
        $tags_html = '';
        foreach ($tags as $tag) {
            $tags_html .= '<span class="badge badge-success" style="font-weight: bold;">'.$tag.'</span>';
        }
        return $tags_html;
    }else{
        return $text;
    }
}

function hasPermissions($permission){
    $getPermission = Permission::where('name',$permission)->limit(1)->count();
    if ($getPermission > 0) {
        if(!Auth::user()->hasPermissionTo($permission))
            abort(403);
    }else{
        abort(404);
    }
}

function hasPermissionsStatistics($permission){
    $getPermission = Permission::where('name',$permission)->limit(1)->count();
    if ($getPermission > 0) {
        if(!Auth::user()->hasPermissionTo($permission))
            return 'hasnot';
    }else{
        return 'notfound';
    }
}


function setPublic()
{
    if($_SERVER['REMOTE_ADDR'] != '127.0.0.1')
    {
        return "public/";
    }
}

function getStations($id)
{
    return Stations::findOrfail($id)->title;
}

function generateTrip($trip)
{
    $from = $trip->from;
    $to = $trip->to;
    $cross = (array)json_decode($trip->cross);
    $cross = array_values($cross);
    $result = [];
    $result[] = '('.getStations($from).' <=> '.getStations($cross[0]).') , ';
    for ($i=1; $i < count($cross); $i++) {
        $result[] = '('.getStations($cross[$i-1]).' <=> '.getStations($cross[$i]).') , ';
    }
    $result[] = '('.getStations($cross[(count($cross) - 1)]).' <=> '.getStations($to).')';
    return $result;
}

function generateTripForBook($trip)
{
    $from = $trip->from;
    $to = $trip->to;
    $cross = (array)json_decode($trip->cross);
    $cross = array_values($cross);
    $result = [];
    $result[] = '('.getStations($from).' <=> '.getStations($cross[0]).') , ';
    for ($i=1; $i < count($cross); $i++) {
        $result[] = '('.getStations($cross[$i-1]).' <=> '.getStations($cross[$i]).') , ';
    }
    $result[] = '('.getStations($cross[(count($cross) - 1)]).' <=> '.getStations($to).')';
    return $result;
}

function seatBooked($seat)
{
    return Booking::where('seat',$seat)->first();
}
