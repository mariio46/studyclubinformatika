@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'disabled:text-gray-500 form-textarea w-full border-none ring-1 rounded-md ring-gray-300 focus:ring-green-400 text-sm placeholder:text-sm dark:bg-black dark:text-gray-300 dark:ring-gray-600 dark:focus:ring-cyan-400 dark:placeholder:text-gray-400 disabled:text-gray-500 ',
]) !!}>
{{ $slot }}</textarea>
