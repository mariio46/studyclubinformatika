<x-dashboard.header title="Security Information" description="3">
    <x-slot:header>
        @if (Auth::user()->updated_at->diffForHumans() == '1 year ago')
            <span class="text-red-500">Last update password is
                {{ Auth::user()->updated_at->diffForHumans() }}</span>
        @elseif (Auth::user()->updated_at->diffForHumans() == '3 months ago')
            <span class="text-yellow-400">Last update password is
                {{ Auth::user()->updated_at->diffForHumans() }}</span>
        @else
            <span class="text-green-500">Last update password is
                {{ Auth::user()->updated_at->diffForHumans() }}</span>
        @endif
    </x-slot:header>
</x-dashboard.header>
<x-primary-link class="mt-2" href="{{ route('profile.edit') }}">update</x-primary-link>
