<ul class="divide-y divide-gray-200 py-2 text-sm dark:divide-gray-700" aria-labelledby="{{ $item->id }}">
    @if (!$open)
        <li>
            @if ($item->has_verified == 1)
                <form action="{{ route('registrant.unverify', $item) }}" method="post">
                    @csrf
                    @method('put')
                    <button class="w-full px-4 py-3 text-left hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600" type="submit">
                        <span class="flex items-center font-medium text-red-600">
                            <x-svg class="mr-1 h-6 w-6" svg="unverified" strokeWidth="1.5" stroke="currentColor" />
                            Unverified
                        </span>
                    </button>
                </form>
            @else
                <form action="{{ route('registrant.verify', $item) }}" method="post">
                    @csrf
                    @method('put')
                    <button class="w-full px-4 py-3 text-left hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600" type="submit">
                        <span class="flex items-center font-medium text-gray-700 dark:text-gray-300">
                            <x-svg class="mr-1 h-6 w-6" svg="verified" strokeWidth="1.5" stroke="currentColor" />
                            Verified
                        </span>
                    </button>
                </form>
            @endif
        </li>
        @hasrole('admin')
            <li>
                <form action="{{ route('registrant.promote', $item) }}" method="post">
                    @csrf
                    @method('put')
                    <button class="w-full px-4 py-3 text-left hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600" type="submit"
                        onclick="return confirm('Are you sure want to promote {{ $item->getNickname() }}?')">
                        <span class="flex items-center text-gray-700 dark:text-gray-300">
                            <x-svg class="mr-1 h-6 w-6" svg="promote" strokeWidth="1.5" stroke="currentColor" />
                            Promote
                        </span>
                    </button>
                </form>
            </li>
        @endhasrole
        <li>
            <a class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600" href="{{ route('registrant.pdf.preview', $item) }}" target="_blank"
                rel="noopener noreferrer">
                <x-svg class="mr-1 h-6 w-6" svg="pdf" strokeWidth="1.5" stroke="currentColor" />
                Preview
            </a>
        </li>
    @endif
    <li>
        <a class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600" href="{{ route('registrant.show', $item) }}">
            <x-svg class="mr-1 h-6 w-6" svg="show" strokeWidth="1.5" stroke="currentColor" />
            Show
        </a>
    </li>
    <li>
        <form action="{{ route('registrant.delete', $item) }}" method="post">
            @csrf
            @method('delete')
            <button class="w-full px-4 py-3 text-left hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600" type="submit"
                @if ($item->biodata_count == 1 || $item->has_verified == 1) onclick="return confirm('Are you sure want to delete {{ $item->getNickname() }}?')" @endif>
                <span class="flex items-center font-medium text-red-600">
                    <x-svg class="mr-1 h-6 w-6" svg="delete" strokeWidth="1.5" stroke="currentColor" />
                    Delete
                </span>
            </button>
        </form>
    </li>
</ul>
