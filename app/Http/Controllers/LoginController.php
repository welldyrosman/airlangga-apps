<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;

class LoginController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        $oauthUser = Socialite::driver('google')->user();

        $user = User::where('google_id', $oauthUser->id)->first();
        if ($user) {
            Auth::loginUsingId($user->id);
            return redirect('/');
        } else {
           // throw new Exception($oauthUser->id);
            $google_id=$oauthUser->id;
            $newUser = User::create([
                'name' => $oauthUser->name,
                'email' => $oauthUser->email,
                'google_id'=> $google_id,
                // password tidak akan digunakan ;)
                'password' => md5($oauthUser->token),
            ]);
            Auth::login($newUser);
            return redirect('/');
        }
    }
}
