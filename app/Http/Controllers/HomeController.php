<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Videos\SingleVideoPageController;
use App\Media\MediaInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $slideMedias   = MediaInfo::orderBy('created_at', 'desc')->limit(10)->get();
        $popularVideos = (new SingleVideoPageController())->popularVideos(6);
        $rightVideos   = $this->homeWeigetMedias([1,2],6);
        $leftVideos   = $this->homeWeigetMedias([3],6);
        return view('index',compact('slideMedias','popularVideos','rightVideos','leftVideos'));
    }

    private function homeWeigetMedias($category =[],$limit)
    {
        return MediaInfo::whereIn('category_id', $category)->orderBy('created_at','desc')->limit($limit)->get();
    }
}
