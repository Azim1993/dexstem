<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SubscribeController extends Controller
{
    public function subscribeForm()
    {
        $subscribe = (Auth::user()->subscribed('main'))?'subscribed': 'not yet subscribe';
        return view('user.subscribe',compact('subscribe'));
    }

    public function subscribeCreate(Request $request)
    {
        Auth::user()->newSubscription('main', 'weekly')->create($request->input('stripeToken'));
        return redirect('/user/subscribe')->with('success','Successfully subscribed');
    }

}
