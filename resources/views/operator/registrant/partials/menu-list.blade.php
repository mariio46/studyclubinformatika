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
    class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gradient-to-tl dark:from-cyan-950 dark:via-black dark:to-cyan-950 border border-gray-200 dark:border-gray-700 ">
    <ul class="py-2 text-sm divide-y divide-gray-200 dark:divide-gray-700" aria-labelledby="{{ $item->id }}">
        @if (!$open)
            <li>
                @if ($item->has_verified == 1)
                    <form action="{{ route('registrant.unverify', $item) }}" method="post">
                        @csrf
                        @method('put')
                        <button type="submit"
                            class="w-full text-left px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">
                            <span class="font-medium text-red-600 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-1" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5"></path>
                                    <path d="M22 22l-5 -5"></path>
                                    <path d="M17 22l5 -5"></path>
                                </svg>
                                Unverified
                            </span>
                        </button>
                    </form>
                @else
                    <form action="{{ route('registrant.verify', $item) }}" method="post">
                        @csrf
                        @method('put')
                        <button type="submit"
                            class="w-full text-left px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">
                            <span class="font-medium text-gray-700 dark:text-gray-300  flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-1" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                                    <path d="M15 19l2 2l4 -4"></path>
                                </svg>
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
                        <button type="submit"
                            class="w-full text-left px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white"
                            onclick="return confirm('Are you sure want to promote {{ $item->getNickname() }}?')">
                            <span class=" text-gray-700 dark:text-gray-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-1" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                                    <path d="M19 22v-6"></path>
                                    <path d="M22 19l-3 -3l-3 3"></path>
                                </svg>
                                Promote
                            </span>
                        </button>
                    </form>
                </li>
            @endhasrole
            <li>
                <a href="{{ route('registrant.pdf.preview', $item) }}" target="_blank" rel="noopener noreferrer"
                    class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
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
        @endif
        <li>
            <a href="{{ route('registrant.show', $item) }}"
                class=" flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
                Show
            </a>
        </li>
        <li>
            <form action="{{ route('registrant.delete', $item) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit"
                    class="w-full text-left px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white"
                    @if ($item->biodata_count == 1 || $item->has_verified == 1) onclick="return confirm('Are you sure want to delete {{ $item->getNickname() }}?')" @endif>
                    <span class="font-medium text-red-600  flex items-center">
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
                        Delete
                    </span>
                </button>
            </form>
        </li>
    </ul>
</div>
