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
                    <x-header-menu-dropdown placement="left">
                        <x-slot:contents>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownMenuIconButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-green-500 font-medium hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Export
                                        PDF</a>
                                </li>
                            </ul>
                            @if ($registrants->first())
                                @include('operator.registrant.partials.menu')
                            @endif
                        </x-slot:contents>
                    </x-header-menu-dropdown>
                @endif
            </div>

            <div class="max-w-sm mt-5">
                {{-- @include('operator.registrant.partials.search-input-form') --}}
                <x-search-input-form :route="route('registrant.index')" placeholder="Search Registrant" />
            </div>

            {{-- <div class="relative overflow-x-auto mt-5">
                <ul role="list" class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse ($registrants as $item)
                        <li class="flex justify-between gap-x-6 py-5">
                            <div class="flex min-w-0 gap-x-4">
                                <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                    src="{{ asset('storage/' . $item->picture) }}" alt="">
                                <div class="min-w-0 flex-auto">
                                    <p
                                        class="flex items-center gap-1 text-sm font-semibold leading-6 text-gray-900 dark:text-gray-200">
                                        <a href="{{ route('registrant.show', $item) }}" class="hover:underline">
                                            @if ($item->has_verified == 1)
                                                <span class="flex gap-1">
                                                    {{ $item->name }}
                                                    <x-registrant-verified-icon />
                                                </span>
                                            @else
                                                {{ $item->name }}
                                            @endif
                                        </a>
                                    </p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500 dark:text-gray-400">
                                        {{ $item->email . ' • ' . $item->username . ' • ' . $item->created_at->diffForHumans() . ' • ' }}
                                        @if ($item->biodata_count == 1)
                                            <span class="text-green-500">Has Biodata</span>
                                        @else
                                            <span class="text-green-600">No Biodata</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full
                                        dark:bg-gray-700 dark:text-green-300 border border-green-300 select-none">
                                        Registrant
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
            </div> --}}
            <div class="relative overflow-x-auto mt-5">
                @include('operator.registrant.partials.table-list')
            </div>
        </x-work-space>
    </div>

    @include('operator.registrant.partials.all-delete-modal')

</x-auth-layout>
