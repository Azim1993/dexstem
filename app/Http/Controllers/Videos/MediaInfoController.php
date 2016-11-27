<?php

namespace App\Http\Controllers\Videos;

use App\Media\Categories;
use App\Media\MediaInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\MediaUploadValidator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MediaInfoController extends Controller
{
    protected function index()
    {
//        dd('hello');
        $media = MediaInfo::orderBy('created_at','desc')->paginate(20);
        return view('admin.video.videos',compact('media'));
    }
    protected function create()
    {
        $categorys = Categories::all();
        return view('admin.video.addVideo',compact('categorys'));
    }

    protected function store(MediaUploadValidator $request)
    {
        $thumb = $request->file('mediaThumbnail');
        $thumbName = $thumb->getClientOriginalName();
        $thumbDestination = public_path() . '/thumbnail/';
        $mediaThumb = $thumb->move($thumbDestination,$thumbName);
        if($mediaThumb == true)
        {
            $storeMedia = MediaInfo::create([
                'title' => $request->input('mediaTitle'),
                'description' => $request->input('mediaDiscription'),
                'category_id' => $request->input('mediaCategory'),
                'mediaThumbnail' => $thumbName,
                'remember_token' => $request->input('_token'),
            ]);
            if($storeMedia == true)
                return redirect('/admin/video/'.$storeMedia->id.'/add-video');
        }
        return back()->withInput()->with('mediaError','Something Error Happen');
    }

    protected function showMedia($id)
    {
        $media = MediaInfo::find($id);
        if($media != null)
            return view('admin.video.singleVideo',compact('media'));
        return redirect('all-media')->with('warning','No media found for this id');
    }
}
