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
                    'password'=>bcrypt("12345678"),//This password has no value as authentication is being done by google
                ]);
                Auth::login($new_user);
                return redirect()->route('dashboard');
            }
        }
        catch(Exception $exception){

        }
    }
}
