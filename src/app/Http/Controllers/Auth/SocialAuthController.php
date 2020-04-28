<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;

class SocialAuthController extends Controller
{
    //
    public function loginGoogleCallback(Request $request){
        $googleUser = Socialite::driver('Google')->user();

        if ( !$googleUser ){
            return 'Can not authenticate';
        }

        $systemUser = User::where('google_id', $googleUser->id)->get()->first();
        
        if ( ! $systemUser ){
            $systemUser = User::Create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id
            ]);
        }

        return $this->loginAndRedirect($systemUser);
    }

    public function loginFacebookCallback(Request $request) {
        $facebookUser = Socialite::driver('Facebook')->user();

        if ( !$facebookUser ){
            return 'Can not authenticate';
        }

        $systemUser = User::where('facebook_id', $facebookUser->id)->get()->first();
        
        // if user not currently on our system
        if ( ! $systemUser ){
            $systemUser = User::Create([
                'name' => $facebookUser->name,
                'email' => ($facebookUser->email) ?? '',
                'facebook_id' => $facebookUser->id
            ]);
        }

        return $this->loginAndRedirect($systemUser);

    }

    protected function loginAndRedirect($user) {
        Auth::loginUsingId($user->id);
        if (Auth::user()->role->name == 'admin') {
            $routeTo = 'adminHome';
        }
        elseif (Auth::user()->role->name == 'user'){
            $routeTo = 'profile';
        }
        else {
            // else???
        }

        return redirect()->route($routeTo);
    }
}
