@props(['title', 'description'])

<div class="group">
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        {{ $title }}
    </h2>
    <span {{ $attributes->merge(['class' => 'text-sm text-gray-600 dark:text-gray-400']) }}>
        {{ $header }}
        @isset($body)
            <button data-popover-target="popover-description-{{ $description }}" data-popover-placement="bottom-end" type="button"><svg
                    class="-ml-1 h-4 w-4 animate-bounce text-yellow-400 hover:text-yellow-500 group-hover:animate-none" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                        clip-rule="evenodd"></path>
                </svg><span class="sr-only">Show information</span>
            </button>
            <div class="invisible absolute z-10 inline-block w-72 rounded-lg border border-gray-200 bg-white text-sm text-gray-500 opacity-0 shadow-sm transition-opacity duration-300 dark:border-gray-700 dark:bg-black dark:text-gray-400"
                id="popover-description-{{ $description }}" data-popover role="tooltip">
                <div class="space-y-2 p-3">
                    {{ $body }}
                </div>
                <div data-popper-arrow></div>
            </div>
        @endisset
    </span>
</div>
