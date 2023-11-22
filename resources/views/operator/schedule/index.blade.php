<x-auth-layout title="Schedule List">
    <x-work-space class="relative overflow-x-auto">
        <div class="item-center flex justify-between">
            <x-header title="Jadwal" description="1">
                <x-slot:header>
                    {{-- here's all schedules that we're going todo. --}}
                    List semua jadwal untuk kegiatan yang akan dilakukan.
                </x-slot:header>
            </x-header>
            <x-header-menu-dropdown placement="bottom-end">
                <x-slot:contents>
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                        <li>
                            <button class="w-full text-left" type="submit" x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-schedule')">
                                <span class="flex items-center px-4 py-2 font-medium text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <x-svg class="mr-1 h-6 w-6" svg="add-schedule" fill="none" strokeWidth="1.5" stroke="currentColor" />
                                    Add Schedule
                                </span>
                            </button>
                        </li>
                    </ul>
                </x-slot:contents>
            </x-header-menu-dropdown>
        </div>
        <div class="mt-5">
            @include('operator.schedule.partials.items')
        </div>
    </x-work-space>
    @include('operator.schedule.partials.modal-create')
</x-auth-layout>
