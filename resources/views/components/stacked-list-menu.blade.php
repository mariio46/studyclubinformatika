@props(['id' => 'stacked-list-menu-1', 'data' => 'data-stacked-list-menu-1', 'placement' => 'bottom-end', 'type' => 'yellow', 'title' => 'Operator'])

<div class="flex items-center gap-x-2">
    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
        <x-badge :type="$type" :title="$title" />
    </div>
    <div>
        <button
            class="mr-1 inline-flex items-center rounded-lg bg-white p-2 text-center text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-50 dark:bg-transparent dark:text-gray-200 dark:hover:bg-gray-900/50 dark:focus:ring-gray-600"
            id="{{ $id }}" data-dropdown-toggle="{{ $data }}" data-dropdown-placement="{{ $placement }}" type="button">
            <x-svg class="h-6 w-6 text-slate-800 dark:text-slate-400" svg="stacked-list" fill="none" strokeWidth="1.5" stroke="currentColor" />

        </button>
        <div class="z-10 hidden w-60 rounded-lg border border-gray-200 bg-white shadow dark:border-gray-700 dark:bg-gradient-to-tl dark:from-cyan-950 dark:via-black dark:to-cyan-950"
            id="{{ $data }}">
            {{ $slot }}
        </div>
    </div>
</div>
