<x-modal name="confirm-delete-unverified-registrants" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('registrant.unverified.delete') }}" class="p-6">
        @csrf
        @method('delete')

        <x-dashboard.header title="Are you sure you want to delete unverified registrants?" description="11">
            <x-slot:header>
                Once you delete unverified registrants, all of its resources and data will be permanently deleted.
                Please
                enter your password to confirm you would like to permanently delete unverified registrants.
                </x-slot>
        </x-dashboard.header>

        <div class="mt-6">
            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                placeholder="{{ __('Password') }}" />

            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-between sm:justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3">
                {{ __('Delete Account') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
