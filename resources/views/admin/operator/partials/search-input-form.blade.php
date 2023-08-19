<form class="flex items-center" action="" method="GET">
    <label for="simple-search" class="sr-only">Search</label>
    <div class="relative w-full">
        <x-input-search-icon />
        <x-input-text-search></x-input-text-search>
    </div>
    @if (request()->keyword)
        <x-cancel-search-button href="{{ route('operator.index') }}" />
    @else
        <x-search-button />
    @endif
</form>
