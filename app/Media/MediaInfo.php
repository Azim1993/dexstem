<?php

namespace App\Media;

use Illuminate\Database\Eloquent\Model;

class MediaInfo extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'mediaDetail';

    protected $fillable = ['title','description','category_id','mediaThumbnail'];

    protected $hidden =['remember_token'];

    public function categories()
    {
        return $this->hasOne('App\Media\Categories','id','category_id')->select('catTitle');
    }

    public function video()
    {
        return $this->hasOne('App\Media\Videos','media_id','id')->select('id','demoName','videoName');
    }

    public function likeOrDislike()
    {
       return $this->hasOne('App\Media\LikeDislike','mediaId','id')->select('like','dislike');
    }

    public function views()
    {
        return $this->hasOne('App\ViewCounter','postId','id')->select('view');
    }
}
