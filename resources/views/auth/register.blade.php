<x-guest-layout title="Register">
    <x-slot:header>
        <div class="mt-10">
            <x-application-logo class="h-7 w-auto text-black dark:text-white sm:h-8" />
        </div>
    </x-slot:header>
    <div
        class="mt-6 w-full overflow-hidden border border-gray-200 bg-white px-6 py-4 shadow-lg dark:border-gray-700 dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-teal-950 dark:via-black dark:to-teal-950 sm:max-w-md sm:rounded-lg">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input class="mt-1 block w-full" id="email" name="email" type="email" :value="old('email')" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input class="mt-1 block w-full" id="password" name="password" type="password" required autocomplete="new-password" />

                <x-input-error class="mt-2" :messages="$errors->get('password')" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input class="mt-1 block w-full" id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" />

                <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
            </div>

            <!-- Show Password -->
            <div class="mt-4 block">
                <label class="mt-1 inline-flex items-center" for="show">
                    <input class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-green-600 dark:focus:ring-offset-gray-800"
                        id="show" type="checkbox">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Show password') }}</span>
                </label>
            </div>

            <div class="mt-4 flex items-center justify-end">
                <a class="rounded-md text-sm text-gray-600 hover:text-gray-900 hover:underline focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <script>
        const password = document.getElementById("password");
        const password_confirmation = document.getElementById("password_confirmation");
        const show = document.getElementById("show");

        show.onchange = function(e) {
            password.type = show.checked ? "text" : "password";
            password_confirmation.type = show.checked ? "text" : "password";
        }
    </script>
</x-guest-layout>
