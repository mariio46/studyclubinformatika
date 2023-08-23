@props(['route', 'placeholder' => 'Search'])

<form class="flex items-center"method="GET">
    <label for="simple-search" class="sr-only">Search</label>
    <div class="relative w-full">
        <x-input-search-icon />
        <x-input-text-search :placeholder="$placeholder" />
    </div>
    @if (request()->keyword)
        <x-cancel-search-button href="{{ $route }}" />
    @else
        <x-search-button />
    @endif
</form>
