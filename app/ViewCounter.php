<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewCounter extends Model
{
    protected $id =  'id';

    protected $table ='viewCounter';

    protected $fillable = ['postId','view'];

    public function media()
    {
        $this->hasOne('App\Media\MediaInfo','id','postId');
    }
}
