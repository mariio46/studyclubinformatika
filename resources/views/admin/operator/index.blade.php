<x-auth-layout title="Operator List">
    <x-work-space>
        <div class="flex item-center justify-between">
            <x-dashboard.header title="Operators List" description="1">
                <x-slot:header>
                    This is a list operator, who in charge of managing the registrants.
                </x-slot:header>
            </x-dashboard.header>

            <x-header-menu-dropdown>
                <x-slot:contents>
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                        <li>
                            <button type="submit" class="w-full text-left" x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'add-operator')">
                                <span
                                    class="font-medium text-green-500 hover:underline block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Create operator
                                </span>
                            </button>
                        </li>
                    </ul>
                </x-slot:contents>
            </x-header-menu-dropdown>
        </div>

        <div class="max-w-sm mt-5">
            @include('admin.operator.partials.search-input-form')
        </div>

        <div class="relative overflow-x-auto mt-5">
            <ul role="list" class="divide-y divide-gray-100 dark:divide-gray-700">
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
                        <div class="flex items-center">
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
