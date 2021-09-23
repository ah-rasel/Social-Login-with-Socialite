<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function authenticatedByGoogle()
    {
        try{
            $user = Socialite::driver('google')->user();
            $user_found = User::Where('google_id',$user->id)->first();
            if($user_found){
                Auth::login($user_found);
                return redirect()->route('dashboard');
            }
            else{
               $new_user =  User::create([
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'google_id'=>$user->id,
                    'password'=>"12345678", //Not encrypting this for some reason bcrypt() is the function i use to encrypt
                    //This password has no value as authentication is being done by google
                ]);
                Auth::login($new_user);
                return redirect()->route('dashboard');
            }
        }
        catch(Exception $exception){

        }
    }
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function authenticatedByFacebook()
    {
        // Do stuffs after authenticating by facebook like how its done above for google
    }
    
}
