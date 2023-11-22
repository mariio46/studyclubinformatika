<section>
    <x-header title="Informasi Keamanan" description="1">
        <x-slot name="header">
            Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman
        </x-slot>
    </x-header>

    <form class="mt-6 space-y-6" method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        @if (auth()->user()->password)
            <div>
                <x-input-label for="current_password" :value="__('Current Password')" />
                <x-text-input class="mt-1 block w-full" id="current_password" name="current_password" type="password" autocomplete="current-password" />
                <x-input-error class="mt-2" :messages="$errors->updatePassword->get('current_password')" />
            </div>
        @else
            <div>
                <span class="animate-pulse text-red-500">
                    Warning, You dont have password!
                </span>
            </div>
        @endif

        <div>
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input class="mt-1 block w-full" id="password" name="password" type="password" autocomplete="new-password" />
            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password')" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input class="mt-1 block w-full" id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password_confirmation')" />
        </div>

        <div class="mt-4 flex items-center">
            <label class="inline-flex items-center" for="show">
                <input class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-green-600 dark:focus:ring-offset-gray-800"
                    id="show" type="checkbox">
                <span class="mb-0.5 ml-2 select-none text-sm text-gray-600 dark:text-gray-400">{{ __('Show password') }}</span>
            </label>
        </div>

        <div class="flex items-center gap-4 max-lg:justify-end">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p class="text-sm text-gray-600 dark:text-gray-400" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">{{ __('Saved.') }}</p>
            @endif
        </div>

        <script>
            const current_password = document.getElementById("current_password");
            const password = document.getElementById("password");
            const confirm_password = document.getElementById("password_confirmation");
            const show = document.getElementById("show");

            show.onchange = function(e) {
                password.type = show.checked ? "text" : "password";
                current_password.type = show.checked ? "text" : "password";
                confirm_password.type = show.checked ? "text" : "password";
            }
        </script>
    </form>
</section>
