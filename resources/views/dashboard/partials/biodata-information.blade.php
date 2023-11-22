@if ($open)
    @isset(Auth::user()->biodata)
        <x-header title="Informasi Biodata" description="6">
            <x-slot:header>
                <span class="text-green-500">
                    Biodata di perbarui {{ Auth::user()->biodata->updated_at->diffForHumans() }}
                </span>
            </x-slot:header>
        </x-header>
        <x-primary-link class="mt-2" href="{{ route('biodata.index') }}">update</x-primary-link>
    @else
        <x-header title="Informasi Biodata" description="7">
            <x-slot:header>
                <span class="text-green-500">
                    {{ 'anda perlu membuat biodata untuk melanjutkan!' }}
                </span>
            </x-slot:header>
        </x-header>
    @endisset
@else
    <x-header title="Biodata" description="8">
        <x-slot:header>
            <span class="text-green-500">
                Biodata di perbarui {{ Auth::user()->biodata->updated_at->diffForHumans() }}
            </span>
        </x-slot:header>
    </x-header>
    <div class="flex items-center">
        <x-primary-button class="mt-2 disabled:bg-gray-800/50 disabled:hover:bg-gray-800/50" href="#" disabled>
            update
        </x-primary-button>
    </div>
@endif
