<x-stacked-list>
    @forelse ($collections as $item)
        <x-stacked-list-item>
            <x-slot:item>
                @isset($item->picture)
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{ asset('storage/' . $item->picture) }}" alt="">
                @else
                    <x-svg class="h-12 w-12 text-gray-200 dark:text-gray-700" svg="avatar" fill="currentColor" viewBox="0 0 20 20" />
                @endisset
                <div class="min-w-0 flex-auto">
                    <p class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900 dark:text-gray-200">
                        <a class="hover:underline" href="{{ route('operator.show', $item) }}">{{ $item->name }}</a>
                        <span class="sm:hidden">
                            <x-verified-icon type="operator" />
                        </span>
                    </p>
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500 dark:text-gray-400">
                        {{ $item->email . ' . ' . $item->username }}
                    </p>
                </div>
            </x-slot:item>
            <x-stacked-list-menu type="operator" title="Operator" :id="$item->id" :data="$item->username" placement="bottom-end">
                @include('admin.operator.partials.item-menu')
            </x-stacked-list-menu>
        </x-stacked-list-item>
    @empty
        <x-empty-loop />
    @endforelse
</x-stacked-list>
