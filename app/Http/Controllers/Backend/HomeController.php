<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Tags\Models\Tags;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = 'Home';
        $pages = [];
        $users_count = User::count();
        $components = [
            [$users_count,'Users','users','primary'],
        ];

        return view('backend.index',compact('components','pages','title'));
    }
}
