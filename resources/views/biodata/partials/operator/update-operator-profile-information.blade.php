<form action="{{ route('profile.update') }}" method="post">
    @csrf
    @method('patch')
    <input name="userId" type="hidden" value="{{ auth()->user()->id }}">
    <div class="mb-2">
        <x-input-label for="name" :value="__('name')" />
        <x-text-input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name', $user->name)" required autocomplete="name" />
        <x-input-error class="mt-1 text-xs" :messages="$errors->get('name')" />
    </div>
    <div class="mb-2">
        <x-input-label for="username" :value="__('username')" />
        <x-text-input class="mt-1 block w-full" id="username" name="username" type="text" :value="old('username', $user->username)" required autocomplete="username" />
        <x-input-error class="mt-1 text-xs" :messages="$errors->get('username')" />
    </div>
    <div class="mb-4">
        <x-input-label for="email" :value="__('email')" />
        <x-text-input class="mt-1 block w-full" id="email" name="email" type="email" :value="old('email', $user->email)" required autocomplete="email" />
        <x-input-error class="mt-1 text-xs" :messages="$errors->get('email')" />
    </div>
    @role('operator')
        <div class="mb-4">
            <x-input-label for="whatsapp" :value="__('Whatsapp')" />
            <x-text-input class="mt-1 block w-full" id="whatsapp" name="whatsapp" type="text" :value="old('whatsapp', $user->whatsapp)" required autocomplete="whatsapp" />
            <x-input-error class="mt-1 text-xs" :messages="$errors->get('whatsapp')" />
        </div>
    @endrole
    <div class="flex items-center justify-end gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>
