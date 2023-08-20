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
                @include('operator.registrant.partials.search-input-form')
            </div>

            <div class="relative overflow-x-auto mt-5">
                @include('operator.registrant.partials.table-list')
            </div>
        </x-work-space>
    </div>

    @include('operator.registrant.partials.all-delete-modal')

</x-auth-layout>
