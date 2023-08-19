@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-600 dark:text-gray-300']) }}>
    {{ Str::title($value) ?? Str::title($slot) }}
</label>
