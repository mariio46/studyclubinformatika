<x-modal name="confirm-delete-all-registrants" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form class="p-6" method="post" action="{{ route('registrant.all.delete') }}">
        @csrf
        @method('delete')

        <x-header title="Are you sure you want to delete all registrants?" description="10">
            <x-slot:header>
                Once you delete all registrants, all of its resources and data will be permanently deleted. Please
                enter your password to confirm you would like to permanently delete all registrants.
            </x-slot:header>
        </x-header>

        <div class="mt-6">
            <x-input-label class="sr-only" for="password" value="{{ __('Password') }}" />

            <x-text-input class="mt-1 block w-full" id="password" name="password" type="password" placeholder="{{ __('Password') }}" />

            <x-input-error class="mt-2" :messages="$errors->userDeletion->get('password')" />
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
