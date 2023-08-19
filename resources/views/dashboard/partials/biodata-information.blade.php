@if ($open)
    @isset(Auth::user()->biodata)
        <x-dashboard.header title="Biodata Information" description="4">
            <x-slot:header>
                @if (Auth::user()->biodata->updated_at->diffForHumans() == '1 year ago')
                    <span class="text-red-500">Last update biodata is
                        {{ Auth::user()->biodata->updated_at->diffForHumans() }}</span>
                @elseif (Auth::user()->biodata->updated_at->diffForHumans() == '3 months ago')
                    <span class="text-yellow-400">Last update biodata is
                        {{ Auth::user()->biodata->updated_at->diffForHumans() }}</span>
                @else
                    <span class="text-green-500">Last update biodata is
                        {{ Auth::user()->biodata->updated_at->diffForHumans() }}</span>
                @endif
            </x-slot:header>
        </x-dashboard.header>
        <x-primary-link class="mt-2" href="{{ route('biodata.index') }}">update</x-primary-link>
    @else
        <x-dashboard.header title="Biodata Information" description="3">
            <x-slot:header>
                <span class="text-green-500">
                    {{ 'you need biodata for the next step!' }}
                </span>
            </x-slot:header>
        </x-dashboard.header>
        <div class="flex items-center gap-4 mt-2">
            @include('biodata.partials.store-biodata-information')
        </div>
    @endisset
@else
    <x-dashboard.header title="Biodata" description="3">
        <x-slot:header>
            <span class="text-red-500">
                {{ 'Sorry, Registration is closed.' }}
            </span>
        </x-slot:header>
    </x-dashboard.header>
    <div class="flex items-center">
        <x-primary-button class="mt-2 disabled:bg-gray-800/50 disabled:hover:bg-gray-800/50" disabled href="#">
            create
        </x-primary-button>
    </div>
@endif
