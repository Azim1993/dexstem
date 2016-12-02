<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    protected function users()
    {
        $users = User::orderBy('created_at','desc')->limit(20)->get();
        return view('user.users',compact('users'));
    }
}
