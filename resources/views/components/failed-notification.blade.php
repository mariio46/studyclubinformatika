@props(['status'])

@if ($status)
    <div class="fixed bottom-6 left-1/2 z-50 flex w-[calc(100%-2rem)] -translate-x-1/2 flex-col justify-between rounded-lg border border-gray-100 bg-black p-4 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:bg-gradient-to-bl dark:from-teal-950 dark:via-black dark:to-teal-950 md:flex-row lg:max-w-3xl"
        id="marketing-banner" tabindex="-1" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)">
        <div class="flex w-full items-center justify-between">
            <p class="flex items-center text-sm font-normal text-gray-200 dark:text-gray-400">
                <svg class="mr-2 h-7 w-7 font-medium text-red-500" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-medium">{{ $status }}.</span>
            </p>
            <button class="inline-flex h-7 w-7 flex-shrink-0 items-center justify-center rounded-lg text-sm text-red-500 hover:text-red-800 dark:hover:bg-gray-600 dark:hover:text-white"
                data-dismiss-target="#marketing-banner" type="button">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close banner</span>
            </button>
        </div>
    </div>
@endif
