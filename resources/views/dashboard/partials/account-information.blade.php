<x-dashboard.header title="Account Information" description="2">
    <x-slot:header>
        @if (Auth::user()->updated_at->diffForHumans() == '1 year ago')
            <span class="text-red-500">Last update account is
                {{ Auth::user()->updated_at->diffForHumans() }}</span>
        @elseif (Auth::user()->updated_at->diffForHumans() == '3 months ago')
            <span class="text-yellow-500">Last update account is
                {{ Auth::user()->updated_at->diffForHumans() }}</span>
        @else
            <span class="text-green-500">Last update account is
                {{ Auth::user()->updated_at->diffForHumans() }}</span>
        @endif
    </x-slot:header>
</x-dashboard.header>
<x-primary-link class="mt-2" href="{{ route('biodata.index') }}">update</x-primary-link>
