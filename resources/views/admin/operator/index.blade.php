<x-auth-layout title="Operator List">
    <x-work-space>
        <div class="flex item-center justify-between">
            <x-dashboard.header title="Operators List" description="1">
                <x-slot:header>
                    This is a list operator, who in charge of managing the registrants.
                </x-slot:header>
            </x-dashboard.header>

            <x-header-menu-dropdown placement="bottom-end">
                <x-slot:contents>
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                        <li>
                            <button type="submit" class="w-full text-left" x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'add-operator')">
                                <span
                                    class="flex items-center font-medium text-gray-700 dark:text-gray-300 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-1" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                        <path d="M16 19h6"></path>
                                        <path d="M19 16v6"></path>
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                                    </svg>
                                    Add operator
                                </span>
                            </button>
                        </li>
                    </ul>
                </x-slot:contents>
            </x-header-menu-dropdown>
        </div>

        <div class="max-w-sm mt-5">
            <x-search-input-form :route="route('operator.index')" placeholder="Search Operator" />
        </div>

        <div class="relative overflow-x-auto mt-5">
            <ul role="list" class="divide-y divide-gray-100 dark:divide-gray-700 min-h-[50vh]">
                @forelse ($operators as $item)
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                src="{{ asset('storage/' . $item->picture) }}" alt="">
                            <div class="min-w-0 flex-auto">
                                <p
                                    class="flex items-center gap-1 text-sm font-semibold leading-6 text-gray-900 dark:text-gray-200">
                                    <a href="{{ route('operator.show', $item) }}"
                                        class="hover:underline">{{ $item->name }}</a>
                                    <span class="sm:hidden">
                                        <x-operator-verified-icon />
                                    </span>
                                </p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500 dark:text-gray-400">
                                    {{ $item->email . ' . ' . $item->username }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-x-2">
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full
                                    dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300 select-none">
                                    Operator
                                </span>
                            </div>
                            <div>
                                @include('admin.operator.partials.menu-list')
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="flex justify-center">
                        <div class="py-6 text-md lg:text-lg animate-pulse text-red-600 font-medium mx-1">
                            <span class="underline">{{ Str::title(request()->keyword) }}</span>
                            is not on this list.
                        </div>
                    </li>
                @endforelse
            </ul>
        </div>
    </x-work-space>
    @include('admin.operator.partials.create-modal')

</x-auth-layout>
