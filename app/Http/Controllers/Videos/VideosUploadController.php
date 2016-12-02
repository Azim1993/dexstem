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
        $demoName = $demo->getClientOriginalName();
        $destination = public_path() . '/videos/'.$id;
        $demoMedia = $demo->move($destination,$demoName);
        if($this->checkVideosTable($id) != null)
        {
            $demoUpload = Videos::where('media_id',$id)->update(['demoName' => $demoName]);
            if($demoUpload == true)
                return redirect('/admin/video/'.$id.'/add-video')->with('success','Demo Video update');
            return back()->with('warning','Demo Video is not update');
        }else{
//            return 'not found';
            $demoUpload = Videos::create([
                'demoName' => $demoName,
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
        $premiumName = $premium->getClientOriginalName();
        $destination = public_path() . '/videos/'.$id;
        $premiumMedia = $premium->move($destination,$premiumName);
        if($this->checkVideosTable($id) != null)
        {
            $premiumUpload = Videos::where('media_id',$id)->update(['videoName' => $premiumName]);
            if($premiumUpload == true)
                return redirect('/admin/video/'.$id.'/add-video')->with('success','Premium Video update');
            return back()->with('warning','Premium Video is not update');
        }else{
//            return 'not found';
            $premiumUpload = Videos::create([
                'videoName' => $premiumName,
                'media_id' => $id
            ]);
            if($premiumUpload == true)
                return redirect('/admin/video/'.$id.'/add-video')->with('success','Premium Video uploaded');
            return back()->with('warning','Premium Video is not uploaded');
        }
    }

    protected function updateDemo($mediaId,$videoId, Request $request)
    {
        $this->validate($request,['demoVideo' => 'required | mimes:mp4,mov,ogg,qt']);

        $video = $this->checkVideoForUpdate($mediaId,$videoId);
        \File::delete('videos/'.$mediaId.'/'.$video->demoName);
        $demo = $request->file('demoVideo');
        $demoName = $demo->getClientOriginalName();
        $destination = public_path() . '/videos/'.$mediaId;
        $demoMedia = $demo->move($destination,$demoName);
        if($video == true && $demoMedia == true)
        {
            $updateVideo = $video->update(['demoName'=> $demoName] );
            if($updateVideo == true)
                return back()->with('success','video updated');
            return back()->with('warning','video not updated');
        } else
        {
            return redirect('admin/all-media')->with('warning','no media found at this id or errors happend');
        }

    }

    protected function updatePremium($mediaId,$videoId, Request $request)
    {
        $this->validate($request,['premiumVideo' => 'required | mimes:mp4,mov,ogg,qt']);

        $video = $this->checkVideoForUpdate($mediaId,$videoId);
        \File::delete('videos/'.$mediaId.'/'.$video->demoName);
        $premium = $request->file('premiumVideo');
        $premiumName = $premium->getClientOriginalName();
        $destination = public_path() . '/videos/'.$mediaId;
        $premiumMedia = $premium->move($destination,$premiumName);
        if($video == true && $premiumMedia == true)
        {
            $updateVideo = $video->update(['videoName'=> $premiumName] );
            if($updateVideo == true)
                return back()->with('success','video updated');
            return back()->with('warning','video not updated');
        } else
        {
            return redirect('admin/all-media')->with('warning','no media found at this id or errors happend');
        }

    }

    protected function checkVideosTable($id)
    {
        return Videos::where('media_id',$id)->first();
    }

    protected function checkVideoForUpdate($mediaId,$videoId)
    {
        return Videos::where(['id'=>$videoId,'media_id'=>$mediaId])->first();
    }
}
