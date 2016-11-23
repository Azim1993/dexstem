<?php

namespace App\Media;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'category';

    protected $fillable = ['catTitle'];

    protected $hidden = ['remember_token'];

    protected function mediaInfo()
    {
        return $this->hasMany('App\Media\MediaInfo','mediaCategory','id');
    }
}
