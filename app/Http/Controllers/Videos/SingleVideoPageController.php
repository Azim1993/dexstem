<?php

namespace App\Http\Controllers\Videos;

use App\Media\LikeDislike;
use App\Media\MediaInfo;
use App\ViewCounter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SingleVideoPageController extends Controller
{
    public function show($id)
    {
        $videoId = decrypt($id);

        $video = MediaInfo::find($videoId);
        $popularVideos = $this->popularVideos(2);
        $relatedVideos = MediaInfo::where('category_id',$video->category_id)->where('id', '!=', $videoId)->limit(6)->get();

        if($video == true)
            return view('single',compact('video','relatedVideos','popularVideos'));
        return abort(404);
    }

    protected function viewCount($postId)
    {
        $postId = decrypt($postId);
        $viewValue = $this->viewcheck($postId);
        if( $viewValue)
        {
            $views = $viewValue->view;
            $updateView = $viewValue->update([ 'view' => $views + 1 ]);
            if($updateView == true)
                return $views+1;
            return false;
        }
        else
        {
            $viewCreate = $this->createView($postId);
            if($viewCreate == true)
                return 1;
            return false;
        }
    }

    private function viewcheck($postId)
    {
        return ViewCounter::where('postId',$postId)->first();
    }

    private function createView($postId)
    {
        return ViewCounter::create([
            'postId' => $postId,
            'view'   => 1
        ]);
    }

    public function popularVideos($limit)
    {
        return ViewCounter::orderBy('view','desc')->limit($limit)->get();
    }
}
