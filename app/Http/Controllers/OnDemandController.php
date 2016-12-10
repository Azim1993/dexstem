<?php

namespace App\Http\Controllers;

use App\Demand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnDemandController extends Controller
{
    protected function index()
    {
        $demands = Demand::orderBy('created_at','desc')->limit(20)->get();
        return view('user.demand',compact('demands'));
    }

    protected function userDemands()
    {
        $demands = Demand::where('userId',Auth::user()->id)->limit(20)->get();
        return view('user.userDemand',compact('demands'));
    }

    protected function store(Request $request)
    {
        $this->validate($request,['demand_body' => 'required']);
        $demand = Demand::create([
                'userId' => Auth::user()->id,
                'demand' => $request->input('demand_body')
            ]);

        if($demand == true)
            return back()->with('success','Demand Requested');
        return back()->withInput()->with('warning','Demand Requested failed');
    }

    protected function update(Request $request, $demandId)
    {
        $this->validate($request,['demand_body' => 'required']);
        $demand = Demand::where([
                'id'    => $demandId,
                'userId'=> Auth::user()->id
            ])->update(['demand' => $request->input('demand_body')]);

        if($demand == true)
            return back()->with('success','Demand Requested');
        return back()->withInput()->with('warning','Demand Requested failed');
    }

    protected function publish($id)
    {
        $publish = Demand::where('id',$id)->update(['publish'=> true]);
        if($publish)
            return back()->with('success','Marked as publish');
        return back()->with('warning','can not Marked as publish');
    }

}
