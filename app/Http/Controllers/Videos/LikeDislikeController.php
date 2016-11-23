<?php

namespace App\Http\Controllers\Videos;

use App\Media\LikeDislike;
use App\Media\UserInteraction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LikeDislikeController extends Controller
{
    public function storeLike($postId)
    {
        if(!empty($this->checkLikeDislikeTable($postId)))
        {
            if(empty($this->hasUserInterapt($postId)))
            {
                $interaption = $this->createInteraption($postId, true );
                $updateLike = $this->updateLike($postId);
                if($interaption == true && $updateLike == true)
                    return redirect('/single/'.encrypt($postId))->with('success','you like update');
                return redirect('/single/'.encrypt($postId))->with('warning','you like update fail');
            }
            else
            {
                if($this->hasUserInterapt($postId)->imo == false)
                {
                    $updateInteraption = $this->updateInteraption($postId, true);
                    $updateLike = $this->updateLike($postId);
                    $decrement = $this->decrementDislike($postId);
                    if($decrement == true && $updateInteraption == true && $updateLike == true)
                        return redirect('/single/'.encrypt($postId))->with('success','you like update with decrement');
                    return redirect('/single/'.encrypt($postId))->with('warning','you like fail to update with decrement');
                }
                else
                {
                    return redirect('/single/'.encrypt($postId))->with('warning','you already liked this');
                }
            }
        }
        else
        {
            $interaption = $this->createInteraption($postId,true);
            $createLike = $this->createLike($postId);
            if($interaption == true && $createLike == true)
                return redirect('/single/'.encrypt($postId))->with('success','you like create');
            return redirect('/single/'.encrypt($postId))->with('warning','you like create fail');
        }
    }

    public function storeDislike($postId)
    {
        if(!empty($this->checkLikeDislikeTable($postId)))
        {
            if(empty($this->hasUserInterapt($postId)))
            {
                $interaption = $this->createInteraption($postId, false);
                $updateLike = $this->updateDisLike($postId);
                if($interaption == true && $updateLike == true)
                    return redirect('/single/'.encrypt($postId))->with('success','you dislike update');
                return redirect('/single/'.encrypt($postId))->with('warning','you dislike update fail');
            }
            else
            {
                if($this->hasUserInterapt($postId)->imo == true)
                {
                    $updateInteraption = $this->updateInteraption($postId, false);
                    $updateLike = $this->updateDisLike($postId);
                    $decrement  = $this->decrementLike($postId);
                    if($decrement == true && $updateInteraption == true && $updateLike == true)
                        return redirect('/single/'.encrypt($postId))->with('success','you dislike with decrement');
                    return redirect('/single/'.encrypt($postId))->with('warning','you dislike fail with decrement');
                }
                else
                {
                    return redirect('/single/'.encrypt($postId))->with('warning','you already dis-like this');
                }
            }
        }
        else
        {
            $interaption = $this->createInteraption($postId,false);
            $createDislike = $this->createDisLike($postId);
            if($interaption == true && $createDislike == true)
                return redirect('/single/'.encrypt($postId))->with('success','you dislike create');
            return redirect('/single/'.encrypt($postId))->with('warning','you dislike create fail');
        }
    }

    private function hasUserInterapt($postId)
    {
        return UserInteraction::where([
            'userId' => Auth::user()->id,
            'postId' => $postId
        ])->first();
    }

    private function createInteraption($postId,$interapt)
    {
        return UserInteraction::create([
                'userId' => Auth::user()->id,
                'postId' => $postId,
                'imo'    => $interapt
            ]);
    }

    private function updateInteraption($postId,$interapt)
    {
        return $this->hasUserInterapt($postId)->update(['imo' => $interapt]);
    }

    private function createLike($postId)
    {
        return LikeDislike::create([
            'mediaId' => $postId,
            'like' => 1
        ]);
    }

    private function updateLike($postId)
    {
        $tableCheck = $this->checkLikeDislikeTable($postId);
        $like = $tableCheck->like;

        return $tableCheck->update(['like' => $like + 1]);
    }

    private function decrementLike($postId)
    {
        $tableCheck = $this->checkLikeDislikeTable($postId);
        $like = $tableCheck->like;

        return $tableCheck->update(['like' => $like - 1]);
    }

    private function createDisLike($postId)
    {
        return LikeDislike::create([
            'mediaId' => $postId,
            'dislike' => 1
        ]);
    }

    private function updateDisLike($postId)
    {
        $tableCheck = $this->checkLikeDislikeTable($postId);
        $dislike = $tableCheck->dislike;

        return $tableCheck->update(['dislike' => $dislike + 1]);
    }

    private function decrementDislike($postId)
    {
        $tableCheck = $this->checkLikeDislikeTable($postId);
        $dislike = $tableCheck->dislike;

        return $tableCheck->update(['dislike' => $dislike - 1]);
    }

    private function checkLikeDislikeTable($postId)
    {
        return LikeDislike::where('mediaId',$postId)->first();
    }

}
