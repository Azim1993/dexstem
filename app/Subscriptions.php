<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Laravel\Cashier\Billable;

class Subscriptions extends Model
{
//    use Billable;
    protected $primaryKey = 'id';

    protected $table = 'subscriptions';

    protected $fillable = ['user_id','name','stripe_id','stripe_plan','quantity'];

    protected $dates = ['trial_ends_at', 'ends_at'];

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
