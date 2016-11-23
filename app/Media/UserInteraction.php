<?php

namespace App\Media;

use Illuminate\Database\Eloquent\Model;

class UserInteraction extends Model
{
    protected $table = 'user_interaction_user';

    protected $fillable = ['userId','postId','imo'];
}
