<x-header title="Security Information" description="4">
    <x-slot:header>
        @if (auth()->user()->password)
            <span class="text-green-500">
                Last update password is {{ Auth::user()->updated_at->diffForHumans() }}
            </span>
        @else
            <span class="text-red-500 animate-pulse">
                Warning, You dont have password!
            </span>
        @endif
    </x-slot:header>
</x-header>
<x-primary-link class="mt-2" href="{{ route('profile.edit') }}">update</x-primary-link>
