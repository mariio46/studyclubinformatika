<ul class="divide-y divide-gray-200 py-2 text-sm dark:divide-gray-700" aria-labelledby="{{ $item->id }}">
    <li>
        <a class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600" href="{{ route('operator.show', $item) }}">
            <x-svg class="mr-1 h-6 w-6" svg="show" strokeWidth="1.5" stroke="currentColor" />
            Show
        </a>
    </li>
    <li>
        <form action="{{ route('registrant.delete', $item) }}" method="post">
            @csrf
            @method('delete')
            <button class="w-full px-4 py-2 text-left hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600" type="submit"
                onclick="return confirm('Are you sure want to delete {{ $item->name }}?')">
                <span class="flex items-center font-medium text-red-600">
                    <x-svg class="mr-1 h-6 w-6" svg="delete" strokeWidth="1.5" stroke="currentColor" />
                    Delete
                </span>
            </button>
        </form>
    </li>
</ul>
