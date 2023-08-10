<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    /**
     * -------------------------------------------------- Google --------------------------------------------------
     */
    // Redirect the user to the Google authentication page.
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle the Google callback.
    public function handleGoogleCallback()
    {
        try {
            $socialUser = Socialite::driver('google')->user();

            // dd($socialUser);

            $user = User::updateOrCreate([
                'email' => $socialUser->email
            ], [
                'name' => $socialUser->name,
                'avatar' => $socialUser->avatar,
                'google_id' => $socialUser->id,
                'google_token' => $socialUser->token,
            ]);

            Auth::login($user, true);

            return Redirect::to('/dashboard');
        } catch (\Exception $e) {
            return Redirect::to('/login');
        }
    }
}
