<ul class="divide-y divide-gray-200 py-2 text-sm dark:divide-gray-700" aria-labelledby="{{ $item->identifier }}">
    <li>
        <a class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600" href="{{ route('schedule.edit', $item) }}">
            <x-svg class="mr-1 h-6 w-6" svg="edit" strokeWidth="1.5" stroke="currentColor" />
            Edit
        </a>
    </li>
    <li>
        @if ($item->active_in == null)
            <form action="{{ route('schedule.activate', $item) }}" method="post">
                @csrf
                @method('put')
                <button class="w-full px-4 py-3 text-left hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600" type="submit"
                    onclick="return confirm('Are you sure want to activate this schdule?')">
                    <span class="flex items-center font-medium text-gray-700 dark:text-gray-300">
                        <x-svg class="mr-1 h-6 w-6" svg="activate" strokeWidth="1.5" stroke="currentColor" />
                        Aktifkan
                    </span>
                </button>
            </form>
        @else
            <form action="{{ route('schedule.deactivate', $item) }}" method="post">
                @csrf
                @method('put')
                <button class="w-full px-4 py-3 text-left hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600" type="submit"
                    onclick="return confirm('Are you sure want to deactivate this schdule?')">
                    <span class="flex items-center font-medium text-yellow-400">
                        <x-svg class="mr-1 h-6 w-6" svg="deactivate" strokeWidth="1.5" stroke="currentColor" />
                        Nonaktifkan
                    </span>
                </button>
            </form>
        @endif
    </li>
    <li>
        <form action="{{ route('schedule.delete', $item) }}" method="post">
            @csrf
            @method('delete')
            <button class="w-full px-4 py-3 text-left hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600" type="submit"
                onclick="return confirm('Are you sure want to delete {{ $item->name }}?')">
                <span class="flex items-center font-medium text-red-600">
                    <x-svg class="mr-1 h-6 w-6" svg="delete" strokeWidth="1.5" stroke="currentColor" />
                    Hapus
                </span>
            </button>
        </form>
    </li>
</ul>
