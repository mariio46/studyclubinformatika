<x-modal name="add-operator" :show="$errors->operatorDelition->isNotEmpty()" focusable>
    <form class="space-y-3 p-6" action="{{ route('operator.store') }}" method="POST">
        @csrf
        <x-header title="Daftarkan operator" description="10">
            <x-slot:header>
                Modal ini untuk mendaftarkan operator.
            </x-slot:header>
        </x-header>
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name')" autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->operatorDelition->get('name')" />
        </div>
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input class="mt-1 block w-full" id="email" name="email" type="email" :value="old('email')" autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->operatorDelition->get('email')" />
        </div>
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input class="mt-1 block w-full" id="password" name="password" type="password" autocomplete="new-password" />
            <x-input-error class="mt-2" :messages="$errors->operatorDelition->get('password')" />
        </div>
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input class="mt-1 block w-full" id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
            <x-input-error class="mt-2" :messages="$errors->operatorDelition->get('password_confirmation')" />
        </div>
        <div class="mt-6 flex justify-between gap-2 sm:justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button>
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
