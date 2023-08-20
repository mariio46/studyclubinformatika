<aside id="separator-sidebar"
    class="fixed lg:top-20 left-0 z-40 w-64 h-screen transition-transform -translate-x-full lg:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-white dark:bg-black">
        @auth
            <ul
                class="pb-4 mb-4 space-y-2 font-medium {{ auth()->user()->role_id === 3 ? null : 'border-b border-b-gray-300 dark:border-gray-700' }}">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="{{ Request::routeIs('dashboard') ? 'bg-slate-200/70 dark:bg-slate-200/20' : null }} flex items-center p-2 text-dark rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6 text-slate-800 transition duration-75 dark:text-gray-400 group-hover:text-primary dark:group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap group-hover:text-primary">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('biodata.index') }}"
                        class="{{ Request::routeIs('biodata.*') ? 'bg-slate-200/70 dark:bg-slate-200/20' : null }} flex items-center p-2 text-dark rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6 text-slate-800 transition duration-75 dark:text-gray-400 group-hover:text-primary dark:group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                        @hasanyrole(['operator', 'admin'])
                            <span class="flex-1 ml-3 whitespace-nowrap group-hover:text-primary">Profile</span>
                        @else
                            <span class="flex-1 ml-3 whitespace-nowrap group-hover:text-primary">Biodata</span>
                        @endhasanyrole
                    </a>
                </li>
                <li>
                    <a href="{{ route('status.index') }}"
                        class="{{ Request::routeIs('status.*') ? 'bg-slate-200/70 dark:bg-slate-200/20' : null }} flex items-center p-2 text-dark rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-6 h-6 text-slate-800 transition duration-75 dark:text-gray-400 group-hover:text-primary dark:group-hover:text-white"
                            viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 14C4.73478 14 4.48043 14.1054 4.29289 14.2929C4.10535 14.4805 4 14.7348 4 15V20C4 20.2652 4.10535 20.5196 4.29289 20.7071C4.48043 20.8947 4.73478 21 5 21C5.26521 21 5.51957 20.8947 5.7071 20.7071C5.89464 20.5196 6 20.2652 6 20V15C6 14.7348 5.89464 14.4805 5.7071 14.2929C5.51957 14.1054 5.26521 14 5 14Z" />
                            <path
                                d="M10 10C9.73478 10 9.48043 10.1054 9.29289 10.2929C9.10535 10.4805 9 10.7348 9 11V20C9 20.2652 9.10535 20.5196 9.29289 20.7071C9.48043 20.8947 9.73478 21 10 21C10.2652 21 10.5196 20.8947 10.7071 20.7071C10.8946 20.5196 11 20.2652 11 20V11C11 10.7348 10.8946 10.4805 10.7071 10.2929C10.5196 10.1054 10.2652 10 10 10Z" />
                            <path
                                d="M15 14C14.7348 14 14.4804 14.1054 14.2929 14.2929C14.1054 14.4805 14 14.7348 14 15V20C14 20.2652 14.1054 20.5196 14.2929 20.7071C14.4804 20.8947 14.7348 21 15 21C15.2652 21 15.5196 20.8947 15.7071 20.7071C15.8946 20.5196 16 20.2652 16 20V15C16 14.7348 15.8946 14.4805 15.7071 14.2929C15.5196 14.1054 15.2652 14 15 14Z" />
                            <path
                                d="M20 10C19.7348 10 19.4804 10.1054 19.2929 10.2929C19.1054 10.4805 19 10.7348 19 11V20C19 20.2652 19.1054 20.5196 19.2929 20.7071C19.4804 20.8947 19.7348 21 20 21C20.2652 21 20.5196 20.8947 20.7071 20.7071C20.8946 20.5196 21 20.2652 21 20V11C21 10.7348 20.8946 10.4805 20.7071 10.2929C20.5196 10.1054 20.2652 10 20 10Z" />
                            <path
                                d="M5 11C5.14683 11.0004 5.29194 10.9684 5.42502 10.9064C5.55809 10.8443 5.67588 10.7537 5.77 10.641L10 5.56302L14.231 10.641C14.3282 10.7485 14.4469 10.8344 14.5793 10.8932C14.7118 10.9519 14.8551 10.9823 15 10.9823C15.1449 10.9823 15.2882 10.9519 15.4207 10.8932C15.5531 10.8344 15.6718 10.7485 15.769 10.641L20.769 4.64102C20.939 4.43707 21.021 4.17394 20.997 3.90951C20.973 3.64509 20.8449 3.40103 20.641 3.23102C20.437 3.06102 20.1739 2.979 19.9095 3.003C19.6451 3.02701 19.401 3.15507 19.231 3.35902L15 8.43802L10.769 3.35902C10.6718 3.25156 10.5531 3.16567 10.4207 3.10689C10.2882 3.0481 10.1449 3.01773 10 3.01773C9.85508 3.01773 9.71178 3.0481 9.57933 3.10689C9.44688 3.16567 9.32821 3.25156 9.231 3.35902L4.231 9.35902C4.10903 9.50507 4.03126 9.68289 4.00682 9.87159C3.98238 10.0603 4.01229 10.2521 4.09303 10.4244C4.17377 10.5967 4.302 10.7423 4.46265 10.8443C4.6233 10.9463 4.80971 11.0003 5 11Z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap group-hover:text-primary">Timeline</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}"
                        class="{{ Request::routeIs('profile.*') ? 'bg-slate-200/70 dark:bg-slate-200/20' : null }} flex items-center p-2 text-dark rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6 text-slate-800 transition duration-75 dark:text-gray-400 group-hover:text-primary dark:group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
                        </svg>

                        <span class="flex-1 ml-3 whitespace-nowrap group-hover:text-primary">Security</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tutorial.index') }}"
                        class="{{ Request::routeIs('tutorial.*') ? 'bg-slate-200/70 dark:bg-slate-200/20' : null }} flex items-center p-2 text-dark rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6 text-slate-800 transition duration-75 dark:text-gray-400 group-hover:text-primary dark:group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                        </svg>

                        <span class="flex-1 ml-3 whitespace-nowrap group-hover:text-primary">Tutorial</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('help.index') }}"
                        class="{{ Request::routeIs('help.*') ? 'bg-slate-200/70 dark:bg-slate-200/20' : null }} flex items-center p-2 text-dark transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6 text-slate-800 transition duration-75 dark:text-gray-400 group-hover:text-primary dark:group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>


                        <span class="flex-1 ml-3 whitespace-nowrap group-hover:text-primary">Help</span>
                    </a>
                </li>
            </ul>
        @endauth
        @hasanyrole(['operator', 'admin'])
            <ul
                class="pb-4 mb-4 space-y-2 font-medium {{ auth()->user()->role_id === 2 ? null : 'border-b border-b-gray-300 dark:border-gray-700' }}">
                <li>
                    <a href="{{ route('registrant.index') }}"
                        class="{{ Request::routeIs('registrant.*') ? 'bg-slate-200/70 dark:bg-slate-200/20' : null }} flex items-center p-2 text-dark rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6 text-slate-800 transition duration-75 dark:text-gray-400 group-hover:text-primary dark:group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>

                        <span class="flex-1 ml-3 whitespace-nowrap group-hover:text-primary">Registrant List</span>
                        <span class="inline-flex items-center justify-center ml-3 text-sm font-medium">
                            <x-operator-verified-icon />
                        </span>
                    </a>
                </li>
            </ul>
        @endhasanyrole
        @hasrole('admin')
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('operator.index') }}"
                        class="{{ Request::routeIs('operator.*') ? 'bg-slate-200/70 dark:bg-slate-200/20' : null }} flex items-center p-2 text-dark rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-6 h-6 text-slate-800 transition duration-75 dark:text-gray-400 group-hover:text-primary dark:group-hover:text-white"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_322_456)">
                                <path
                                    d="M8.5 11C7.80777 11 7.13108 10.7947 6.55551 10.4101C5.97993 10.0256 5.53133 9.47893 5.26642 8.83939C5.00152 8.19985 4.9322 7.49612 5.06725 6.81719C5.2023 6.13825 5.53564 5.51461 6.02513 5.02513C6.51461 4.53564 7.13825 4.2023 7.81719 4.06725C8.49612 3.9322 9.19985 4.00152 9.83939 4.26642C10.4789 4.53133 11.0256 4.97993 11.4101 5.55551C11.7947 6.13108 12 6.80777 12 7.5"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M8.5 20H3V18C3 16.9391 3.42143 15.9217 4.17157 15.1716C4.92172 14.4214 5.93913 14 7 14"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M21.5 14H20.38C20.2672 13.5081 20.0714 13.0391 19.801 12.613L20.601 11.818C20.6947 11.7242 20.7474 11.5971 20.7474 11.4645C20.7474 11.3319 20.6947 11.2048 20.601 11.111L19.894 10.404C19.8002 10.3103 19.6731 10.2576 19.5405 10.2576C19.4079 10.2576 19.2808 10.3103 19.187 10.404L18.392 11.204C17.9647 10.9314 17.4939 10.7338 17 10.62V9.5C17 9.36739 16.9473 9.24021 16.8536 9.14645C16.7598 9.05268 16.6326 9 16.5 9H15.5C15.3674 9 15.2402 9.05268 15.1464 9.14645C15.0527 9.24021 15 9.36739 15 9.5V10.62C14.5081 10.7328 14.0391 10.9286 13.613 11.199L12.818 10.404C12.7242 10.3103 12.5971 10.2576 12.4645 10.2576C12.3319 10.2576 12.2048 10.3103 12.111 10.404L11.404 11.111C11.3103 11.2048 11.2576 11.3319 11.2576 11.4645C11.2576 11.5971 11.3103 11.7242 11.404 11.818L12.204 12.618C11.9324 13.0422 11.7349 13.5096 11.62 14H10.5C10.3674 14 10.2402 14.0527 10.1464 14.1464C10.0527 14.2402 10 14.3674 10 14.5V15.5C10 15.6326 10.0527 15.7598 10.1464 15.8536C10.2402 15.9473 10.3674 16 10.5 16H11.62C11.7328 16.4919 11.9286 16.9609 12.199 17.387L11.404 18.182C11.3103 18.2758 11.2576 18.4029 11.2576 18.5355C11.2576 18.6681 11.3103 18.7952 11.404 18.889L12.111 19.596C12.2048 19.6897 12.3319 19.7424 12.4645 19.7424C12.5971 19.7424 12.7242 19.6897 12.818 19.596L13.618 18.796C14.0422 19.0676 14.5096 19.2651 15 19.38V20.5C15 20.6326 15.0527 20.7598 15.1464 20.8536C15.2402 20.9473 15.3674 21 15.5 21H16.5C16.6326 21 16.7598 20.9473 16.8536 20.8536C16.9473 20.7598 17 20.6326 17 20.5V19.38C17.4919 19.2672 17.9609 19.0714 18.387 18.801L19.182 19.601C19.2758 19.6947 19.4029 19.7474 19.5355 19.7474C19.6681 19.7474 19.7952 19.6947 19.889 19.601L20.596 18.894C20.6897 18.8002 20.7424 18.6731 20.7424 18.5405C20.7424 18.4079 20.6897 18.2808 20.596 18.187L19.796 17.392C20.0686 16.9647 20.2662 16.4939 20.38 16H21.5C21.6326 16 21.7598 15.9473 21.8536 15.8536C21.9473 15.7598 22 15.6326 22 15.5V14.5C22 14.3674 21.9473 14.2402 21.8536 14.1464C21.7598 14.0527 21.6326 14 21.5 14ZM16 17.5C15.5055 17.5 15.0222 17.3534 14.6111 17.0787C14.2 16.804 13.8795 16.4135 13.6903 15.9567C13.5011 15.4999 13.4516 14.9972 13.548 14.5123C13.6445 14.0273 13.8826 13.5819 14.2322 13.2322C14.5819 12.8826 15.0273 12.6445 15.5123 12.548C15.9972 12.4516 16.4999 12.5011 16.9567 12.6903C17.4135 12.8795 17.804 13.2 18.0787 13.6111C18.3534 14.0222 18.5 14.5055 18.5 15C18.5 15.663 18.2366 16.2989 17.7678 16.7678C17.2989 17.2366 16.663 17.5 16 17.5Z"
                                    fill="none" stroke="currentColor" stroke-width="1.5" />
                            </g>
                            <defs>
                                <clipPath id="clip0_322_456">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                        <span class="flex-1 ml-3 whitespace-nowrap group-hover:text-primary">Operator List</span>
                        <span class="inline-flex items-center justify-center ml-3 text-sm font-medium">
                            <x-admin-verified-icon />
                        </span>
                    </a>
                </li>
            </ul>
            <div class="mb-32"></div>
        @endhasrole
    </div>
</aside>
