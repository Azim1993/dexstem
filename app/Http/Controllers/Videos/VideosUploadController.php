<?php

namespace App\Http\Controllers\Videos;

use App\Media\MediaInfo;
use App\Media\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VideosUploadController extends Controller
{
    protected function addVideo($id)
    {
        $media = MediaInfo::where('id',$id)->value('title');
        $video = Videos::where('media_id',$id)->first();
        if(!empty($media))
            return view('admin.video.addOnlyVideo',compact('media','id','video'));
        return redirect('/videos')->with('warning','No media is found for id - '.$id);
    }

    protected function storeDemoVideo($id,Request $request)
    {
        $this->validate($request,['demoVideo' => 'required | mimes:mp4,mov,ogg,qt']);
        $demo = $request->file('demoVideo');
        $demoExt = $demo->getClientOriginalExtension();
        $destination = public_path() . '/videos/'.$id;
        $demoMedia = $demo->move($destination,"demo.{$demoExt}");
        if($this->checkVideosTable($id) != null)
        {
            $demoUpload = Videos::where('media_id',$id)->update(['demoName' => $demoExt]);
            if($demoUpload == true)
                return redirect('/admin/video/'.$id.'/add-video')->with('success','Demo Video update');
            return back()->with('warning','Demo Video is not update');
        }else{
//            return 'not found';
            $demoUpload = Videos::create([
                'demoName' => $demoExt,
                'media_id' => $id
            ]);
            if($demoUpload == true)
                return redirect('/admin/video/'.$id.'/add-video')->with('success','Demo Video uploaded');
            return back()->with('warning','Demo Video is not uploaded');
        }
    }

    protected function storePremiumVideo($id,Request $request)
    {
        $this->validate($request,['premiumVideo' => 'required | mimes:mp4,mov,ogg,qt']);

        $premium = $request->file('premiumVideo');
        $premiumExt = $premium->getClientOriginalExtension();
        $destination = public_path() . '/videos/'.$id;
        $premiumMedia = $premium->move($destination,"premium.{$premiumExt}");
        if($this->checkVideosTable($id) != null)
        {
            $premiumUpload = Videos::where('media_id',$id)->update(['videoName' => $premiumExt]);
            if($premiumUpload == true)
                return redirect('/admin/video/'.$id.'/add-video')->with('success','Premium Video update');
            return back()->with('warning','Premium Video is not update');
        }else{
//            return 'not found';
            $premiumUpload = Videos::create([
                'videoName' => $premiumExt,
                'media_id' => $id
            ]);
            if($premiumUpload == true)
                return redirect('/admin/video/'.$id.'/add-video')->with('success','Premium Video uploaded');
            return back()->with('warning','Premium Video is not uploaded');
        }
    }

    protected function checkVideosTable($id)
    {
        return Videos::where('media_id',$id)->first();
    }
}
