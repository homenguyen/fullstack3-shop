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
        $googleUser = Socialite::driver('Google')->stateless()->user();;

        if ( !$googleUser ){
            return 'Can not authenticate';
        }

        $systemUser = User::where('google_id', $googleUser->id)->get()->first();
        
        if ( ! $systemUser ){
            $systemUser = User::where('email', $googleUser->email)->get()->first();
            //  if the email has not been used
            if( !$systemUser){
            $systemUser = User::Create([
                'name' => $googleUser->name,
                'email' => ($googleUser->email) ?? '',
                'google_id' => $googleUser->id
            ]);
            } else{
                $systemUser->update(['google_id' => $googleUser->id]);
            }
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
            $systemUser = User::where('email', $facebookUser->email)->get()->first();
            //  if the email has not been used
            if( !$systemUser){
            $systemUser = User::Create([
                'name' => $facebookUser->name,
                'email' => ($facebookUser->email) ?? '',
                'facebook_id' => $facebookUser->id
            ]);
            } else{
                $systemUser->update(['facebook_id' => $facebookUser->id]);
            }
        }

        return $this->loginAndRedirect($systemUser);

    }

    public function loginGithubCallback(Request $request) {
        $githubUser = Socialite::driver('Github')->user();
        if ( !$githubUser ){
            return 'Can not authenticate';
        }

        $systemUser = User::where('github_id', $githubUser->id)->get()->first();
        
        // if user not currently on our system
        if ( ! $systemUser ){
            $systemUser = User::where('email', $githubUser->email)->get()->first();
            //  if the email has not been used
            if( !$systemUser){
            $systemUser = User::Create([
                'name' => ($githubUser->name) ?? $githubUser->nickname,
                'email' => ($githubUser->email) ?? '',
                'github_id' => $githubUser->id
            ]);
            } else{
                $systemUser->update(['github_id' => $githubUser->id]);
            }
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
