<x-auth-layout>
    <x-work-space>
        <div class="space-y-6">
            <div>
                <div class="item-center flex justify-between">
                    <x-header title="{{ 'Informasi ' . $operator->name }}" description="1">
                        <x-slot:header>
                            Informasi lengkap dari {{ $operator->getNickname() }}.
                        </x-slot:header>
                    </x-header>
                    <x-header-menu-dropdown>
                        <x-slot:contents>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                                <li>
                                    <button class="w-full text-left" type="submit" x-data="" x-on:click.prevent="$dispatch('open-modal', 'operator-forget-password')">
                                        <span class="block px-4 py-2 font-medium text-red-500 hover:bg-gray-100 hover:underline dark:hover:bg-gray-600 dark:hover:text-white">
                                            Forget password?
                                        </span>
                                    </button>
                                </li>
                            </ul>
                        </x-slot:contents>
                    </x-header-menu-dropdown>
                </div>
                <div class="mt-6 grid grid-cols-1 space-y-3 lg:grid-cols-12 lg:space-x-3 lg:space-y-0">
                    <div class="col-span-4 lg:mb-5 min-[1440px]:col-span-3 min-[1440px]:mb-0">
                        <div class="flex justify-center lg:mt-7">
                            @isset($operator->picture)
                                <img class="h-64 w-auto rounded-lg" src="{{ asset('storage/' . $operator->picture) }}" alt="profile-picture">
                            @else
                                <div class="animate-pulse space-y-8 md:flex md:items-center md:space-x-8 md:space-y-0" role="status">
                                    <div class="flex h-64 w-64 items-center justify-center rounded bg-gray-300 dark:bg-gray-700 md:w-48 min-[1440px]:w-40">
                                        <svg class="h-10 w-10 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                            <path
                                                d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                                        </svg>
                                    </div>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            @endisset
                        </div>
                    </div>
                    <div class="col-span-8 lg:mb-5 min-[1440px]:col-span-9 min-[1440px]:mb-0">
                        <div class="mb-2">
                            <x-input-label for="name" :value="__('name')" />
                            <x-text-input class="mt-1 block w-full" id="created_at" disabled :value="old('created_at', $operator->name)" />
                        </div>
                        <div class="mb-2">
                            <x-input-label for="username" :value="__('username')" />
                            <x-text-input class="mt-1 block w-full" id="created_at" disabled :value="old('created_at', $operator->username)" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="email" :value="__('email')" />
                            <x-text-input class="mt-1 block w-full" id="created_at" disabled :value="old('created_at', $operator->email)" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="created_at" :value="__('Whatsapp')" />
                            <x-text-input class="mt-1 block w-full" id="created_at" disabled :value="old('created_at', $operator->whatsapp)" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-work-space>
    @include('admin.operator.partials.forget-password-modal')

    <x-success-notification :status="session('status-success')" />
    <x-failed-notification :status="session('status-failed')" />
</x-auth-layout>
