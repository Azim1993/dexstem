<?php

namespace App\Http\Controllers;

use App\Activation;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;

class ActivationController extends Controller
{
    // sand mail
     public function sendMail($userId)
     {
         $user = User::where('id',$userId)->first();
         $firstName = $user->firstName;
         $this->createActivationTable($user->id);
         $activationToken = Activation::where('userId',$user->id)->value('user_token');
         Mail::send('mail.activation', ['userfirst' =>$firstName,'token' => $activationToken], function($message) use ($user) {
             $message->to($user->email, $user->lastName)
                 ->subject('Activation link');
         });
         return true;
     }

    // Active user by email
    public function userActivate($token)
    {
        $user = $this->checkActivationTableByToken($token);
        if($user != null){
            $this->updateUserActivation($user);
            $this->deleteActivationTable($user);
            return redirect('/login')->with('success','You activate your account successfully');
        }
        return redirect('/login')->with('warning','You are not authorize Or your token is expired');
    }

    public function checkActivationTableByToken($token)
    {
        return Activation::where('user_token',$token)->value('userId');
    }

    public function checkActivationTable($userId)
    {
        return Activation::where('userId',$userId)->first();
    }
    // create activation table
    protected function createActivationTable($userId)
    {
        return Activation::create([
            'userId' => $userId,
            'user_token' => $this->getToken(),
        ]);
    }
    // update activation table
    public function updateActivationTable($userId)
    {
        $findActivation = $this->checkActivationTable($userId);
        if(empty($findActivation))
            return $this->createActivationTable($userId);
        return $findActivation->update(['user_token' => $this->getToken()]);
    }
    // delete activation table
    public function deleteActivationTable($userId)
    {
        $activation = Activation::where('userId',$userId)->first();
        $activation->delete();
    }

    // get token
    protected function getToken()
    {
        return hash_hmac('sha256', str_random(40),config('app.key'));
    }

    // update user activation table
    protected function updateUserActivation($userId)
    {
        $user = User::where('id',$userId)->first();
        $user->activated = true;
        $user->save();
    }

}
