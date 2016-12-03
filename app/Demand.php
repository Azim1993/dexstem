<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    protected $id = 'id';

    protected $table = 'demand';

    protected $fillable = ['demand','userId','publish'];


    protected function user()
    {
        return $this->hasOne('App\User','id','userId');
    }
}
