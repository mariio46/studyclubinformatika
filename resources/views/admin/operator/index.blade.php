<x-auth-layout title="Operator List">
    <x-work-space class="relative overflow-x-auto">
        <div class="item-center flex justify-between">
            <x-header title="List Operator" description="1">
                <x-slot:header>
                    {{-- This is a list operator, who in charge of managing the registrants. --}}
                    List semua operator yang bertanggung jawab untuk mengatur dan mengawasi pendaftar.
                </x-slot:header>
            </x-header>
            <x-header-menu-dropdown placement="bottom-end">
                <x-slot:contents>
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                        <li>
                            <button class="w-full text-left" type="submit" x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-operator')">
                                <span class="flex items-center px-4 py-2 font-medium text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <x-svg class="mr-1 h-6 w-6" svg="add" strokeWidth="1.5" stroke="currentColor" />
                                    Add operator
                                </span>
                            </button>
                        </li>
                    </ul>
                </x-slot:contents>
            </x-header-menu-dropdown>
        </div>
        <div class="mt-5 max-w-sm">
            <x-search-input-form :route="route('operator.index')" placeholder="Cari operator" />
        </div>
        <div class="mt-5">
            @include('admin.operator.partials.items')
        </div>
    </x-work-space>
    @include('admin.operator.partials.create-modal')

</x-auth-layout>
