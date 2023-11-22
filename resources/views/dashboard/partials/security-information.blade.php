<x-header title="Informasi Keamanan" description="4">
    <x-slot:header>
        @if (auth()->user()->password)
            <span class="text-green-500">
                Password di perbarui {{ Auth::user()->updated_at->diffForHumans() }}
            </span>
        @else
            <span class="animate-pulse text-red-500">
                Warning, You dont have password!
            </span>
        @endif
    </x-slot:header>
</x-header>
<x-primary-link class="mt-2" href="{{ route('profile.edit') }}">update</x-primary-link>
