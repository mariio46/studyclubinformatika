<x-auth-layout title="Registrant List">
    <div class="space-y-3">
        <x-work-space>
            <div class="flex justify-between item-center">
                <x-dashboard.header title="Registrants List" description="1">
                    <x-slot:header>
                        This is a registrant who has completed the registration process.
                    </x-slot:header>
                </x-dashboard.header>

                @if (!$open)
                    <x-header-menu-dropdown placement="bottom-end">
                        <x-slot:contents>
                            @include('operator.registrant.partials.menu')
                        </x-slot:contents>
                    </x-header-menu-dropdown>
                @endif
            </div>

            <div class="max-w-sm mt-5">
                <x-search-input-form :route="route('registrant.index')" placeholder="Search Registrant" />
            </div>

            <div class="relative overflow-x-auto mt-5">
                <ul role="list"
                    class="divide-y divide-gray-100 dark:divide-gray-700 min-h-[60vh] @if ($registrants->count() <= 5) md:min-h-[100vh] @endif">
                    @forelse ($registrants as $item)
                        <li class="flex justify-between gap-x-6 py-5 ">
                            <div class="flex min-w-0 gap-x-4">
                                <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                    src="{{ asset('storage/' . $item->picture) }}" alt="">
                                <div class="min-w-0 flex-auto">
                                    <p
                                        class="flex items-center gap-1 text-sm font-semibold leading-6 text-gray-900 dark:text-gray-200">
                                        <a href="{{ route('registrant.show', $item) }}" class="hover:underline">
                                            @if ($item->has_verified == 1)
                                                <span class="flex items-center gap-1">
                                                    {{ $item->getNickname() }}
                                                    <x-registrant-verified-icon />
                                                </span>
                                            @else
                                                {{ $item->name }}
                                            @endif
                                        </a>
                                    </p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500 dark:text-gray-400">
                                        {{ $item->email . ' • ' . $item->username }}
                                    </p>
                                    <p
                                        class=" flex items-center mt-1 gap-x-1 truncate text-xs leading-5 text-gray-500 dark:text-gray-400">
                                        {{ $item->created_at->diffForHumans() }}
                                        @if ($item->biodata_count == 1)
                                            •
                                            <span class="text-green-500 flex items-center">
                                                Biodata
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-[0.1rem]"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M5 12l5 5l10 -10"></path>
                                                </svg>
                                            </span>
                                        @else
                                            •
                                            <span class="text-red-600 flex items-center">
                                                Biodata
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-[0.1rem]"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M18 6l-12 12"></path>
                                                    <path d="M6 6l12 12"></path>
                                                </svg>
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center gap-x-2">
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full
                                        dark:bg-gray-700 dark:text-green-300 border border-green-300 select-none">
                                        Registrant
                                    </span>
                                </div>
                                <div>
                                    @include('operator.registrant.partials.menu-list')
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
            {{-- <div class="relative overflow-x-auto mt-5">
                @include('operator.registrant.partials.table-list')
            </div> --}}
        </x-work-space>
    </div>

    @include('operator.registrant.partials.all-delete-modal')

</x-auth-layout>
