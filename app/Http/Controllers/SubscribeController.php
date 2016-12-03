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
//        $subscribe = (Auth::user()->subscribed('main'))?'subscribed': 'not yet subscribe';
        return view('user.subscribe');
    }

    public function subscribeCreate(Request $request)
    {
        Auth::user()->newSubscription('main', 'weekly')->create($request->input('stripeToken'));
        return redirect('/user/subscribe')->with('success','Successfully subscribed');
    }

    public function subscribeResume(Request $request)
    {
        Auth::user()->subscription('weekly')->resume($request->input('stripeToken'));
        return redirect('/user/subscribe')->with('success','Successfully subscribed');
    }

    public function subscribeUpgrade(Request $request)
    {
        Auth::user()->subscription($request->input('plans'))->swap($request->input('stripeToken'));
        return redirect('/user/subscribe')->with('success','Successfully upgrade');
    }

    public function subscribeCancel(Request $request)
    {
        Auth::user()->subscription()->cancel();
        return redirect('/user/subscribe')->with('success','Successfully canceled');
    }

}
