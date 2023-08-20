<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if (strlen(User::count()) == 1) {
            $num = '0'.User::count() + 1;
            // return $num;
        } elseif (strlen(User::count()) == 2) {
            $num = '0'.User::count() + 1;
            $num = $num == '0100' ? 100 : $num;
            // return $num;
        } else {
            $num = User::count() + 1;
            // return $num;
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'has_verified' => 0,
            'name' => $name = $request->name,
            'username' => strtolower(Str::of($name)->explode(' ')->get(0)).'12'.$num,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->biodata()->create([
            'user_id' => $user->id,
        ]);
        $user->registrantActivity()->create([
            'user_id' => $user->id,
            'account_registration' => 1,
            'account_registration_time' => now(),
            'create_biodata' => 1,
            'create_biodata_time' => now(),
        ]);
        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::DASHBOARD);
    }
}
