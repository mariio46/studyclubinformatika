@props(['heading' => 'accordion-heading-1', 'body' => 'accordion-body-1', 'show' => false, 'class'])

@php
    $classes = 'flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-300';
@endphp

<h2 id="{{ $heading }}">
    <button data-accordion-target="#{{ $body }}" type="button" aria-expanded="{{ $show }}" aria-controls="{{ $body }}" {{ $attributes->merge(['class' => $class ?? $classes]) }}>
        <span>{{ $slot }}</span>
        <svg class="h-3 w-3 shrink-0 rotate-180" data-accordion-icon aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
        </svg>
    </button>
</h2>
