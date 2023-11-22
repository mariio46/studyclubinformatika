<x-guest-layout title="Login">
    <x-slot:header>
        <div class="mt-10">
            <x-application-logo class="h-7 w-auto text-black dark:text-white sm:h-8" />
        </div>
    </x-slot:header>
    <div
        class="mt-6 w-full overflow-hidden border border-gray-200 bg-white px-6 py-4 shadow-md dark:border-gray-700 dark:bg-gradient-to-bl dark:from-teal-950 dark:via-black dark:to-teal-950 sm:max-w-md sm:rounded-lg">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <!-- /Session Status -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input class="mt-1 block w-full" id="email" name="email" type="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input class="mt-1 block w-full" id="password" name="password" type="password" required autocomplete="current-password" />
                <x-input-error class="mt-2" :messages="$errors->get('password')" />
            </div>

            <!-- Remember Me -->
            <div class="mt-4 flex items-center justify-between">
                <label class="inline-flex items-center" for="remember_me">
                    <input class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-green-600 dark:focus:ring-offset-gray-800"
                        id="remember_me" name="remember" type="checkbox">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
                <label class="inline-flex items-center" for="show">
                    <span class="mr-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Show password') }}</span>
                    <input class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-green-600 dark:focus:ring-offset-gray-800"
                        id="show" type="checkbox">
                </label>
            </div>

            <!-- Button -->
            <div class="mt-4 flex items-center justify-between">
                <a class="rounded-md text-sm text-gray-600 hover:text-gray-900 hover:underline focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                    href="{{ route('home') }}">
                    {{ __('Back') }}
                </a>
                <div class="mt-1">
                    <a class="rounded-md text-sm text-gray-600 hover:text-gray-900 hover:underline focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                        href="{{ route('register') }}">
                        {{ __('Register?') }}
                    </a>
                    <x-primary-button class="ml-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
    <script>
        const password = document.getElementById("password");
        const show = document.getElementById("show");

        show.onchange = function(e) {
            password.type = show.checked ? "text" : "password";
        }
    </script>
</x-guest-layout>
