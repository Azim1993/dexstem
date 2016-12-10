<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDetailController extends Controller
{
    protected function users()
    {
        $users = User::orderBy('created_at','desc')->limit(20)->get();
        return view('user.users',compact('users'));
    }

    protected function userBoard()
    {
        $user = User::where('id',Auth::user()->id)->first();

        return view('user.userBoard',compact('user'));
    }
}
