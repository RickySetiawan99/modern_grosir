<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Redirect to the social provider.
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     * Handle the social provider callback.
     */
    public function handleProviderCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();

            $user = \App\Models\User::where('email', $socialUser->getEmail())
                ->orWhere(function($query) use ($socialUser, $provider) {
                    $query->where('social_id', $socialUser->getId())
                          ->where('social_type', $provider);
                })->first();

            if (!$user) {
                $user = \App\Models\User::create([
                    'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                    'email' => $socialUser->getEmail(),
                    'avatar' => $socialUser->getAvatar(),
                    'social_id' => $socialUser->getId(),
                    'social_type' => $provider,
                    'password' => null,
                ]);

                // Auto-assign reseller role for new social signups
                if (\Spatie\Permission\Models\Role::where('name', 'reseller')->exists()) {
                    $user->assignRole('reseller');
                    $user->getResellerProfile();
                }
            } else {
                // Update social info
                $user->update([
                    'social_id' => $socialUser->getId(),
                    'social_type' => $provider,
                    'avatar' => $socialUser->getAvatar(),
                ]);

                // Ensure reseller profile exists
                $user->getResellerProfile();
            }

            Auth::login($user, true);
            request()->session()->regenerate();

            return redirect()->intended('admin/dashboard');

        } catch (\Exception $e) {
            Log::error('Socialite Login Error: ' . $e->getMessage());
            return redirect('/login')->withErrors(['email' => 'Social Login Error: ' . $e->getMessage()]);
        }
    }
}
