<?php

namespace App\Http\Controllers\Auth;

use App\Jobs\UpdateUserAvatar;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginWithGoogleController extends Controller
{
    public function show()
    {
        return view('login');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        /** @var \Laravel\Socialite\Two\User $googleUser */
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->getEmail())->first();
        abort_if(is_null($user), 403);
        auth()->login($user);
        UpdateUserAvatar::dispatch($user, $googleUser->getAvatar());
        session()->put('auth_id', $user->id);
        session()->put('avatar', $user->getAvatar());

        return redirect()->route('home');
    }
}
