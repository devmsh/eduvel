<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Provider;
use App\User;

class ProviderSocialiteController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        // return $user->token;

        // All Providers
        /*$user->getId();
        $user->getNickname();
        $user->getName();
        $user->getEmail();
        $user->getAvatar();*/

        $selectProvider = Provider::where('provider_id', $user->getId())->first();
        if (!$selectProvider) {
            // New User
            $userGetRole = User::where('email', $user->getEmail())->first();
            if (!$userGetRole) {
                $userGetRole = new User();
                $userGetRole->uniqid = uniqid();
                $userGetRole->type_user = 'Student';
                $userGetRole->image = 'user-image.png';
                $userGetRole->confirmed = 0;
                $userGetRole->token = str_random(55);
                $userGetRole->name = $user->getName();
                $userGetRole->email = $user->getEmail();
                $userGetRole->save();
            }
            $newProvider = new User();
            $newProvider->provider_id = $user->getId();
            $newProvider->provider = $provider;
            $newProvider->user_id = $userGetRole->id;
            $newProvider->save();

        } else {
            // login User
            $userGetRole = User::find($selectProvider->user_id);
        }

        auth()->login($userGetRole);
        return $this->userHasRole($userGetRole->id);

    }

    public function userHasRole($id)
    {
        $user = User::find($id);

        if ($user->hasRole('Admin')) {

            return redirect('/admin');
        } elseif ($user->hasRole('Editor')) {

            return redirect('/editor');
        } elseif ($user->hasRole('User')) {

            return 'User';
        } elseif ($user->hasRole('Teacher')) {

            return redirect('/dashboard');
            return redirect('/profile/' . auth()->user()->name);
        } elseif ($user->hasRole('Student')) {

            return redirect('/profile/' . auth()->user()->name);
        }
    }
}
