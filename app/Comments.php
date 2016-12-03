<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $id = 'id';

    protected $table = 'comments';

    protected $fillable = ['userId','postId','comment','parent'];

    public function user()
    {
        return $this->hasOne('App\User','id','userId')->select('firstName','lastName');
    }
}
