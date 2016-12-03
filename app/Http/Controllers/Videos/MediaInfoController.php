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
        return redirect('/admin/all-media')->with('warning','No media found for this id');
    }

    protected function edit($mediaId)
    {
        $categorys = Categories::all();
        $media = MediaInfo::where('id',$mediaId)->first();
        if($media)
            return view('admin.video.editVideo',compact('media','categorys'));
        return redirect('/admin/all-media')->with('warning','No media found for this id');
    }

    protected function update($mediaId, Request $request)
    {
        $this->validate($request,[
            'mediaDiscription'=> 'required',
            'mediaCategory' => 'required',
        ]);
        $media = MediaInfo::where('id',$mediaId)->first();
        $thumb = $request->file('mediaThumbnail');
        if($thumb != null)
        {
            $this->deleteMediaThumbnail($media->mediaThumbnail);
            $thumbName = $thumb->getClientOriginalName();
            $thumbDestination = public_path() . '/thumbnail/';
            $mediaThumb = $thumb->move($thumbDestination,$thumbName);
            if($mediaThumb == true)
            {
                $updateMedia = $media->update([
                    'description' => $request->input('mediaDiscription'),
                    'category_id' => $request->input('mediaCategory'),
                    'mediaThumbnail' => $thumbName,
                ]);
            }

        }else
        {
            $updateMedia = $media->update([
                'description' => $request->input('mediaDiscription'),
                'category_id' => $request->input('mediaCategory'),
            ]);
        }

        if($updateMedia == true)
            return redirect('/admin/media/'.$mediaId)->with('success','media updated');
            return back()->with('warning','media updated fail');
    }

    private function deleteMediaThumbnail($thumbnail)
    {
        return \File::delete('thumbnail/'.$thumbnail);
    }

    protected function delete($id)
    {
        (new VideosUploadController())->delete($id);
        $media = MediaInfo::where('id',$id)->first();
        $this->deleteMediaThumbnail($media->mediaThumbnail);
        $media->delete();
        if($media == true)
            return redirect('admin/all-media')->with('success','Media deleted');
        return redirect('admin/all-media')->with('warning','Media not deleted');
    }
}
