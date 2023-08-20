<x-guest-layout>
    <x-slot:header>
        <div class="mt-10">
            <x-application-logo class="w-auto h-7 sm:h-8 text-black dark:text-white" />
        </div>
    </x-slot:header>
    <div
        class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gradient-to-bl dark:from-teal-950 dark:via-black dark:to-teal-950  shadow-md overflow-hidden sm:rounded-lg border border-gray-200 dark:border-gray-700">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <!-- Remember Me -->
            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-green-600 shadow-sm focus:ring-green-500 dark:focus:ring-green-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
                <label for="show" class="inline-flex items-center">
                    <span class="mr-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Show password') }}</span>
                    <input id="show" type="checkbox"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-green-600 shadow-sm focus:ring-green-500 dark:focus:ring-green-600 dark:focus:ring-offset-gray-800">
                </label>
            </div>
            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('home') }}">
                    {{ __('Back') }}
                </a>
            </div>
            <div class="mt-1">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:focus:ring-offset-gray-800"
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
