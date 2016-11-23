<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'activation';

    protected $fillable = ['userId','user_token'];

    public function user()
    {
        return $this->hasOne('App\User','id','userId');
    }
}
