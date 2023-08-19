{{-- @props(['title']) --}}

<select
    {{ $attributes->merge(['class' => 'disabled:text-gray-500 border-gray-300 dark:border-gray-700 dark:bg-black dark:text-gray-300 focus:border-green-500 dark:focus:border-green-600 focus:ring-green-500 dark:focus:ring-green-600 rounded-md shadow-sm']) }}>
    {{-- <option selected disabled readonly>
        @isset($title)
            Choose your {{ $title }}
        @else
            Please choose one
        @endisset
    </option> --}}
    {{ $slot }}
</select>
