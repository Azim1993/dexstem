<?php

namespace App\Media;

use Illuminate\Database\Eloquent\Model;

class LikeDislike extends Model
{
    protected $id = 'id';

    protected $table = 'video_like_dislike';

    protected $fillable = ['mediaId','like','dislike'];

}
