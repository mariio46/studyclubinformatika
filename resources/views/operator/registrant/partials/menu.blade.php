<ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
    <li>
        <a href="{{ route('registrant.table.pdf.preview') }}" target="_blank" rel="noopener noreferrer"
            class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 font-medium hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-1" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4"></path>
                <path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6"></path>
                <path d="M17 18h2"></path>
                <path d="M20 15h-3v6"></path>
                <path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z"></path>
            </svg>
            Preview
        </a>
    </li>
    <li>
        <a href="#" target="_blank" rel="noopener noreferrer"
            class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 font-medium hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-1" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4"></path>
                <path d="M4 15l4 6"></path>
                <path d="M4 21l4 -6"></path>
                <path
                    d="M17 20.25c0 .414 .336 .75 .75 .75h1.25a1 1 0 0 0 1 -1v-1a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-1a1 1 0 0 1 1 -1h1.25a.75 .75 0 0 1 .75 .75">
                </path>
                <path d="M11 15v6h3"></path>
            </svg>
            Export
        </a>
    </li>
</ul>
@if ($registrants->first())
    <div class="py-2 text-sm text-gray-700 dark:text-gray-200 border-t border-t-gray-200 dark:border-gray-700">
        @if ($registrants->where('has_verified', 0)->first())
            <form action="{{ route('registrant.unverified.delete') }}" method="post" class="">
                @csrf
                @method('delete')
                <div class="flex items-center">
                    <button type="submit" class="w-full text-left"
                        onclick="return confirm('Are you sure want to delete unverified registrants?')">
                        <span
                            class="flex items-center font-medium text-red-600 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-1" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 7l16 0"></path>
                                <path d="M10 11l0 6"></path>
                                <path d="M14 11l0 6"></path>
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                            </svg>
                            Delete unverified
                        </span>
                    </button>
                </div>
            </form>
        @endif

        <button type="submit" class="w-full text-left" x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-delete-all-registrants')">
            <span
                class="flex items-center font-medium text-red-600 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-1" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 7l16 0"></path>
                    <path d="M10 11l0 6"></path>
                    <path d="M14 11l0 6"></path>
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                </svg>
                Delete all
            </span>
        </button>
    </div>
@endif
