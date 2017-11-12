<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;

use App\User;

class LoginController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')
                        ->scopes(config('google.scopes'))
                        ->redirect();
    }

    public function callback(Request $request)
    {
        if (!$request->has('code')) {
            return redirect('/');
        }

        /**
         * @var \Laravel\Socialite\Two\User $user
         */
        $user = Socialite::driver('google')->user();

        /**
         * @var \App\User $loginUser
         */
        $loginUser = User::updateOrCreate(
            [
                'email' => $user->email,
            ],
            [
                'name'          => $user->name,
                'email'         => $user->email,
                'access_token'  => $user->token,
                'refresh_token' => $user->refreshToken,
            ]);

        auth()->login($loginUser, false);

        return redirect('/home');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
