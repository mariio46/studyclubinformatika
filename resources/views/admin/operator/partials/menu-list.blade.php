<button id="{{ $item->id }}" data-dropdown-toggle="{{ $item->username }}" data-dropdown-placement="bottom-end"
    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-2 focus:outline-none dark:text-gray-200 focus:ring-gray-50 dark:bg-transparent dark:hover:bg-gray-900/50 dark:focus:ring-gray-600 mr-1"
    type="button">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
    </svg>
</button>
<div id="{{ $item->username }}"
    class="z-10 hidden bg-white rounded-lg shadow w-44 dark:bg-gradient-to-tl dark:from-cyan-950 dark:via-black dark:to-cyan-950 border border-gray-200 dark:border-gray-700 ">
    <ul class="py-2 text-sm divide-y divide-gray-200 dark:divide-gray-700" aria-labelledby="{{ $item->id }}">
        <li>
            <a href="{{ route('operator.show', $item) }}"
                class=" flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                <x-svg class="w-6 h-6 mr-1" svg="show" strokeWidth="1.5" stroke="currentColor" />
                Show
            </a>
        </li>
        <li>
            <form action="{{ route('registrant.delete', $item) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit"
                    class="w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white"
                    onclick="return confirm('Are you sure want to delete {{ $item->name }}?')">
                    <span class="font-medium text-red-600  flex items-center">
                        <x-svg class="w-6 h-6 mr-1" svg="delete" strokeWidth="1.5" stroke="currentColor" />
                        Delete
                    </span>
                </button>
            </form>
        </li>
    </ul>
</div>
