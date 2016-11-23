<?php

namespace App\Media;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'videos';

    protected $fillable = ['demoName','videoName','media_id'];

    public function media()
    {
        return $this->hasOne('App\Media\MediaInfo','id','media_id')->select('title','mediaThumbnail');
    }
}
