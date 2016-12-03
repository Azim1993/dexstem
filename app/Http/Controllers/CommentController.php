<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    protected function storeComment($postId,Request $request)
    {
        $this->validate($request,['comment' => 'required']);
        $comment = Comments::create([
                'userId' => Auth::user()->id,
                'postId' => $postId,
                'comment'=> $request->input('comment')
            ]);
        if($comment)
            return back();
        return back()->with('warning','could not added comment');

    }

    protected function showComment($postId)
    {
        return Comments::where('postId',$postId)->get();
//        $comments = Comments::where('postId',$postId)->get();
//        $comments = $comments->user['firstName'];
//        $comments = $comments->created_at->diffForHumans();
//        return response()->json()->$comments;
    }
}
