@props(['placement' => 'left-end'])

<div>
    <button
        class="inline-flex items-center rounded-lg bg-white p-1 text-center text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-50 dark:bg-transparent dark:text-white dark:hover:bg-gray-800 dark:focus:ring-gray-600 min-[425px]:p-2"
        id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" data-dropdown-placement="{{ $placement }}" type="button">
        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
            <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
        </svg>
    </button>
    <!-- Dropdown menu -->
    <div class="z-10 hidden w-60 rounded-lg border border-gray-300 bg-white shadow dark:border-gray-700 dark:bg-gradient-to-tl dark:from-cyan-950 dark:via-black dark:to-cyan-950" id="dropdownDots">
        {{ $contents }}
    </div>
</div>
