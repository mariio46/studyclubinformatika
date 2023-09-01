<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\Provider;
use Illuminate\Support\Str;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect(Provider $provider)
    {
        return Socialite::driver($provider->value)->redirect();
    }

    public function callback(Provider $provider)
    {
        $providerUser = Socialite::driver($provider->value)->user();

        $user = $this->getExistingUser($providerUser, $provider->value);

        if (!$user) {
            $user = User::create([
                'name' => $name = $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'username' => strtolower(Str::of($name)->explode(' ')->get(0)) . mt_rand(11111, 99999),
            ]);
        }

        if (!$this->needsToCreateSocial($user, $provider->value)) {
            $user->userSocials()->create([
                'provider_id' => $providerUser->getId(),
                'provider_name' => $provider->value,
            ]);
        }

        if (!$user->biodata) {
            $user->biodata()->create([
                'user_id' => $user->id,
            ]);
        }

        if (!$user->registrantActivity) {
            $user->registrantActivity()->create([
                'user_id' => $user->id,
                'account_registration' => 1,
                'account_registration_time' => now(),
                'create_biodata' => 1,
                'create_biodata_time' => now(),
            ]);
        }

        auth()->login($user);

        return redirect()->intended(RouteServiceProvider::DASHBOARD);
    }

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
}
