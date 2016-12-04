<?php

namespace App\Http\Controllers;

use App\Media\MediaInfo;
use App\User;
use App\ViewCounter;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function admin()
    {
        $totalVideo = MediaInfo::all()->count();

        $totalUser = User::all()->count();

        $views = ViewCounter::all();

        $totalView = 0;
        foreach($views as $view)
        {
            $totalView = $totalView + $view->view;
        }

        return view('admin.deshboard',compact('totalVideo','totalUser','totalView') );
    }
}
