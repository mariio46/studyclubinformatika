<x-modal name="operator-forget-password" :show="$errors->operatorForgetPasswordDelition->isNotEmpty()" focusable>
    <form class="space-y-3 p-6" action="{{ route('operator.forget.password') }}" method="POST">
        @csrf
        @method('put')
        <x-header title="Operator Forget Password" description="10">
            <x-slot:header>
                This is a page where only admin can change operator password.
            </x-slot:header>
        </x-header>
        <input name="userId" type="hidden" value="{{ $operator->id }}">
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input class="mt-1 block w-full" id="password" name="password" type="password" required />

            <x-input-error class="mt-2" :messages="$errors->operatorForgetPasswordDelition->get('password')" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input class="mt-1 block w-full" id="password_confirmation" name="password_confirmation" type="password" />

            <x-input-error class="mt-2" :messages="$errors->operatorForgetPasswordDelition->get('password_confirmation')" />
        </div>
        <div class="mt-6 flex justify-between gap-2 sm:justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button>
                {{ __('Update') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
