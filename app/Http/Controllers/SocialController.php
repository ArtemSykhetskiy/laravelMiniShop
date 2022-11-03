<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('facebook_id', $user->id)->first();

            if($isUser){
                Auth::login($isUser);
            }else{
                $createUser = User::create([
                   'name' => $user->name,
                   'email' => $user->email,
                   'facebook_id' => $user->id,
                    'password' => encrypt('user')
                ]);

                Auth::login($createUser);

                return redirect('/');
            }

        }catch (\Exception $e){
            dd($e->getMessage());
        }
    }
}
