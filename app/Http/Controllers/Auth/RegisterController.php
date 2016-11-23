<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ActivationController;
use App\User;
use Symfony\Component\HttpFoundation\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
//    protected $redirectTo = '/login';
    protected $activation;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ActivationController $activationController)
    {
        $this->middleware('guest');
        $this->activation = $activationController;
    }

    // protected $redirectTo = '/';
    public function register(Request $request)
    {
        $validator = $this->Validator($request->all());
        if($validator->fails()){
            $this->throwValidationException($request, $validator);
        }

        $user = $this->create($request->all());
        $send = $this->activation->sendMail($user->id);
        auth()->logout();
        if($send)
            return redirect('/login')->with('success', 'We sent you an activation code.Please Check your email.');
        return back()->withInput()->with('warning', 'something error happened');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);}
}
