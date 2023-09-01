<?php

namespace App\Http\Controllers;

use App\Enums\Provider;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    protected function needsToCreateSocial(User $user, $provider)
    {
        return (bool) $user->userSocials->where('provider_name', $provider)->count();
    }

    protected function getExistingUser($providerUser, $provider)
    {
        return User::where('email', $providerUser->getEmail())->orWhereHas('userSocials', function ($social) use ($providerUser, $provider) {
            $social->where('provider_id', $providerUser->getId())->where('provider_name', $provider);
        })->first();
    }

    public function redirect(Provider $provider)
    {
        return Socialite::driver($provider->value)->redirect();
    }

    public function callback(Provider $provider)
    {
        $providerUser = Socialite::driver($provider->value)->user();

        $user = $this->getExistingUser($providerUser, $provider->value);

        if (! $user) {
            $user = User::create([
                'name' => $name = $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'username' => strtolower(Str::of($name)->explode(' ')->get(0)).User::getRegistrationCode(),
            ]);
        }

        if (! $this->needsToCreateSocial($user, $provider->value)) {
            $user->userSocials()->create([
                'provider_id' => $providerUser->getId(),
                'provider_name' => $provider->value,
            ]);
        }
        if (! $user->hasAnyRole(['operator', 'admin'])) {
            if (! $user->biodata) {
                $user->biodata()->create([
                    'user_id' => $user->id,
                ]);
            }
            if (! $user->registrantActivity) {
                $user->registrantActivity()->create([
                    'user_id' => $user->id,
                    'account_registration' => 1,
                    'account_registration_time' => now(),
                    'create_biodata' => 1,
                    'create_biodata_time' => now(),
                ]);
            }
        }

        auth()->login($user);

        return redirect()->intended(RouteServiceProvider::DASHBOARD);
    }
}
