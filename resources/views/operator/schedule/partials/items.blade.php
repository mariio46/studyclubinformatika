<x-stacked-list>
    @forelse ($collections as $item)
        <x-stacked-list-item>
            <x-slot:item>
                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-200">
                        <a class="hover:underline" href="{{ route('schedule.edit', $item) }}">{{ $item->name }}</a>
                    </p>
                    <p class="mt-1 flex items-center gap-x-1 truncate text-xs text-gray-500 dark:text-gray-400">
                        {{ $item->location }}
                        •
                        {{ \Carbon\Carbon::parse($item->time)->format('H.i') . ' WITA' }}
                    </p>
                    <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-400">
                        {{ $item->getFullDate() }}
                    </p>
                    <p class="mt-1 truncate text-xs font-medium">
                        @if ($item->active_in == null)
                            <span class="flex items-center text-red-600">
                                Tidak aktif
                                <x-svg class="ml-[0.1rem] h-3 w-3" strokeWidth="1.5" svg="unchecklist" stroke="currentColor" />
                            </span>
                        @else
                            <span class="flex items-center text-green-500">
                                Sedang aktif
                                <x-svg class="ml-[0.1rem] h-3 w-3" strokeWidth="1.5" svg="checklist" stroke="currentColor" />
                            </span>
                        @endif
                    </p>
                </div>
            </x-slot:item>
            <x-stacked-list-menu type="schedule" title="Schedule" :id="$item->id" :data="$item->identifier" placement="bottom-end">
                @include('operator.schedule.partials.item-menu')
            </x-stacked-list-menu>
        </x-stacked-list-item>
    @empty
        <x-empty-loop />
    @endforelse
</x-stacked-list>
