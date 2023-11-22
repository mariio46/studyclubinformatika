<ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
    <li>
        <a class="flex items-center px-4 py-2 font-medium text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
            href="{{ route('registrant.table.pdf.preview') }}" target="_blank" rel="noopener noreferrer">
            <x-svg class="mr-1 h-6 w-6" svg="pdf" strokeWidth="1.5" stroke="currentColor" />
            Preview
        </a>
    </li>
    <li>
        <a class="flex items-center px-4 py-2 font-medium text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" href="#" target="_blank"
            rel="noopener noreferrer">
            <x-svg class="mr-1 h-6 w-6" svg="xls" strokeWidth="1.5" stroke="currentColor" />
            Export
        </a>
    </li>
</ul>
@if ($collections->first())
    <div class="border-t border-t-gray-200 py-2 text-sm text-gray-700 dark:border-gray-700 dark:text-gray-200">
        @if ($collections->where('has_verified', 0)->first())
            <form class="" action="{{ route('registrant.unverified.delete') }}" method="post">
                @csrf
                @method('delete')
                <div class="flex items-center">
                    <button class="w-full text-left" type="submit" onclick="return confirm('Are you sure want to delete unverified registrants?')">
                        <span class="flex items-center px-4 py-2 font-medium text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            <x-svg class="mr-1 h-6 w-6" svg="delete" strokeWidth="1.5" stroke="currentColor" />
                            Delete unverified
                        </span>
                    </button>
                </div>
            </form>
        @endif

        <button class="w-full text-left" type="submit" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-delete-all-registrants')">
            <span class="flex items-center px-4 py-2 font-medium text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                <x-svg class="mr-1 h-6 w-6" svg="delete" strokeWidth="1.5" stroke="currentColor" />
                Delete all
            </span>
        </button>
    </div>
@endif
