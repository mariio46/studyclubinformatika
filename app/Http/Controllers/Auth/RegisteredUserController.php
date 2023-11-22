<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'has_verified' => 0,
            'name' => $name = $request->name,
            'username' => strtolower(Str::of($name)->explode(' ')->get(0)) . User::getRegistrationCode(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->biodata()->create();

        $user->timeline()->create([
            'account_registration' => 1,
            'account_registration_time' => now(),
            'create_biodata' => 1,
            'create_biodata_time' => now(),
        ]);

        event(new Registered($user));

        auth()->login($user);

        return $user?->timeline?->update_biodata == true ? redirect(RouteServiceProvider::DASHBOARD) : to_route('biodata.index');
    }
}
