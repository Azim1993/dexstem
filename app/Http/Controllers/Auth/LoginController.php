<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/deshboard';
    protected function authenticated ($request, $user){
        if (!$user->activated) {
            auth()->logout();
            return back()->with('warning', 'You need to confirm your account FIRST. We have sent you an activation code, please check your email');
        }
        else{
            if($user->role == 1){
                return redirect()->intended('/admin/deshboard');
            }else{
                return redirect()->intended('/user/deshboard');
            }
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
