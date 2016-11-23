<?php

namespace App\Http\Controllers;

use App\Media\MediaInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $slideMedias = MediaInfo::orderBy('created_at', 'desc')->limit(10)->get();
        return view('index',compact('slideMedias'));
    }
}
