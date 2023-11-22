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
                        <a class="hover:underline" href="{{ route('registrant.show', $item) }}">
                            @if ($item->has_verified == 1)
                                <span class="flex items-center gap-x-1">
                                    {{ $item->getNickname() }}
                                    <x-verified-icon type="registrant" />
                                </span>
                            @else
                                {{ $item->name }}
                            @endif
                        </a>
                    </p>
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500 dark:text-gray-400">
                        {{ $item->email . ' • ' . $item->username }}
                    </p>
                    <p class="mt-1 flex flex-wrap-reverse items-center gap-x-1 truncate text-xs leading-5 text-gray-500 dark:text-gray-400">
                        @if ($item->timeline->update_biodata == 1)
                            <span class="flex items-center text-green-500">
                                Biodata sudah diperbarui
                                <x-svg class="ml-[0.1rem] h-3 w-3" strokeWidth="1.5" svg="checklist" stroke="currentColor" />
                            </span>
                        @else
                            <span class="flex items-center text-red-600">
                                Biodata belum diperbarui
                                <x-svg class="ml-[0.1rem] h-3 w-3" strokeWidth="1.5" svg="unchecklist" stroke="currentColor" />
                            </span>
                        @endif
                    </p>
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500 dark:text-gray-400">
                        {{ $item->created_at->diffForHumans() }}
                    </p>
                </div>
            </x-slot:item>
            <x-stacked-list-menu type="registrant" title="Registrant" :id="$item->id" :data="$item->username" placement="bottom-end">
                @include('operator.registrant.partials.item-menu')
            </x-stacked-list-menu>
        </x-stacked-list-item>
    @empty
        <x-empty-loop />
    @endforelse

</x-stacked-list>
