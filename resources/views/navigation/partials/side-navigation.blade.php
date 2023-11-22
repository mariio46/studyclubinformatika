<!-- Sidebar optional 1 -->
<!-- drawer init and toggle new -->
<div class="text-center text-gray-700 dark:text-gray-200">
    <button class="mx-0 flex w-full items-center py-2 text-sm font-normal text-gray-700 group-hover:text-primary dark:text-gray-200 lg:mx-3 lg:text-base lg:font-medium lg:group-hover:font-bold xl:mx-4"
        data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example" data-drawer-placement="right" type="button" aria-controls="drawer-right-example">
        <x-svg class="h-8 w-8" strokeWidth="1.2" stroke="currentColor" svg="menu-side" />
    </button>
</div>

<!-- drawer component new-->
<div class="fixed right-0 top-0 z-40 h-screen w-80 translate-x-full overflow-y-auto bg-white p-4 transition-transform duration-500 dark:bg-black" id="drawer-right-example"
    aria-labelledby="drawer-right-label" tabindex="-1">
    {{-- <h5 id="drawer-right-label" class="flex text-base font-bold text-gray-900 capitalize dark:text-gray-200">
        Study Club <span class="text-primary">&nbsp;Informatika</span>
    </h5> --}}

    <div class="flex items-center">
        <x-application-logo class="mt-1 h-5 w-auto text-black dark:text-white" />
        <button
            class="absolute right-2.5 top-2.5 inline-flex items-center rounded-lg bg-gray-100 p-2 text-sm text-gray-500 hover:bg-gray-200 hover:text-gray-900 dark:bg-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
            data-drawer-hide="drawer-right-example" type="button" aria-controls="drawer-right-example">
            <x-svg class="h-5 w-5" svg="close-sidebar" fill="none" strokeWidth="1.8" stroke="currentColor" />
            <span class="sr-only">Close menu</span>
        </button>
    </div>
    <div class="overflow-y-auto py-4">
        <ul class="space-y-3 font-medium">
            <li class="mt-1 select-none">
                <h5 class="flex items-center font-semibold capitalize text-gray-900 dark:text-gray-200">
                    <x-auth-user />
                </h5>
                <h6 class="text-xs text-gray-500 dark:text-gray-400">
                    {{ auth()->user()->email }}
                </h6>
            </li>
            <div class="w-full border border-gray-200 dark:border-gray-700"></div>
            <li>
                <x-side-navigation-link href="{{ route('home') }}" mode>
                    <x-svg class="h-5 w-5" svg="home" fill="none" strokeWidth="1.5" stroke="currentColor" />
                    <span class="ml-1 flex-1 whitespace-nowrap">Home</span>
                </x-side-navigation-link>
            </li>
            <div class="w-full border border-gray-200 dark:border-gray-700"></div>
            <li>
                <x-side-navigation-link href="{{ route('dashboard') }}" mode>
                    <x-svg class="h-5 w-5" svg="dashboard" fill="none" strokeWidth="1.5" stroke="currentColor" />
                    <span class="ml-1 flex-1 whitespace-nowrap">Dashboard</span>
                </x-side-navigation-link>
            </li>
            <li>
                <x-side-navigation-link href="{{ route('biodata.index') }}" mode>
                    <x-svg class="h-5 w-5" svg="biodata" fill="none" strokeWidth="1.5" stroke="currentColor" />
                    <span class="ml-1 flex-1 whitespace-nowrap">
                        @hasanyrole(['operator', 'admin'])
                            Profile
                        @else
                            Biodata
                        @endhasanyrole
                    </span>
                </x-side-navigation-link>
            </li>
            <li>
                <x-side-navigation-link href="{{ route('timeline') }}" mode>
                    <x-svg class="h-5 w-5" svg="timeline" strokeWidth="1.5" stroke="currentColor" />
                    <span class="ml-1 flex-1 whitespace-nowrap">Timeline</span>
                </x-side-navigation-link>
            </li>
            <li>
                <x-side-navigation-link href="{{ route('profile.edit') }}" mode>
                    <x-svg class="h-5 w-5" svg="security" fill="none" strokeWidth="1.5" stroke="currentColor" />
                    <span class="ml-1 flex-1 whitespace-nowrap">Security</span>
                </x-side-navigation-link>
            </li>
            <li>
                <x-side-navigation-link href="{{ route('tutorial') }}" mode>
                    <x-svg class="h-5 w-5" svg="tutorial" fill="none" strokeWidth="1.5" stroke="currentColor" />
                    <span class="ml-1 flex-1 whitespace-nowrap">Tutorial</span>
                </x-side-navigation-link>
            </li>
            <li>
                <x-side-navigation-link href="{{ route('help') }}" mode>
                    <x-svg class="h-5 w-5" svg="help" fill="none" strokeWidth="1.5" stroke="currentColor" />
                    <span class="ml-1 flex-1 whitespace-nowrap">Help</span>
                </x-side-navigation-link>
            </li>
            @hasanyrole(['operator', 'admin'])
                <div class="w-full border border-gray-200 dark:border-gray-700"></div>
                <li>
                    <x-side-navigation-link class="justify-between" href="{{ route('registrant.index') }}" mode>
                        {{-- <x-svg class="w-5 h-5" svg="registrant-list" fill="none" strokeWidth="1.5"
                            stroke="currentColor" />
                        <span class="flex items-center whitespace-nowrap ml-1 gap-1">
                            Registrant List
                            <x-verified-icon type="operator" />
                        </span> --}}
                        <div class="flex gap-x-1">
                            <x-svg class="h-5 w-5" svg="registrant-list" fill="none" strokeWidth="1.5" stroke="currentColor" />
                            Registrant List
                        </div>
                        <div class="mr-2">
                            <x-verified-icon type="operator" />
                        </div>
                    </x-side-navigation-link>
                </li>
                <li>
                    <x-side-navigation-link class="justify-between" href="{{ route('schedule.index') }}" mode>
                        <div class="flex gap-x-1">
                            <x-svg class="h-5 w-5" svg="schedule" fill="none" strokeWidth="1.5" stroke="currentColor" />
                            Schedules
                        </div>
                        <div class="mr-2">
                            <x-verified-icon type="operator" />
                        </div>
                    </x-side-navigation-link>
                </li>
            @endhasanyrole
            @hasrole('admin')
                <div class="w-full border border-gray-200 dark:border-gray-700"></div>
                <li>
                    <x-side-navigation-link class="justify-between" href="{{ route('operator.index') }}" mode>
                        <div class="flex gap-x-1">
                            <x-svg class="h-5 w-5" svg="operator-list" fill="none" strokeWidth="1.5" stroke="currentColor" />
                            Operator List
                        </div>
                        <div class="mr-2">
                            <x-verified-icon type="admin" />
                        </div>
                    </x-side-navigation-link>
                </li>
            @endhasrole
            <div class="w-full border border-gray-200 dark:border-gray-700"></div>
            <li class="flex items-center justify-between gap-x-2">
                <div class="w-full">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="inline-flex w-full text-left text-gray-900 dark:text-gray-300" type="submit">
                            <x-svg class="h-5 w-5" svg="logout" fill="none" strokeWidth="1.5" stroke="currentColor" />
                            <span class="ml-1 flex-1 whitespace-nowrap">Logout</span>
                        </button>
                    </form>
                </div>
                <div class="">
                    <x-theme-toggle btnId="responsive-theme-toggle" svgDarkId="responsive-theme-toggle-dark-icon" svgLightId="responsive-theme-toggle-light-icon" />
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /Sidebar optional 1 -->

<!----------------------------------------------------------------------------------------------------------------------->

{{-- <!-- Sidebar default -->
<!-- drawer init and show default-->
<div class="text-center  text-gray-700 dark:text-gray-200">
    <button
        class="flex items-center text-sm lg:text-base w-full text-gray-700 py-2 mx-0 lg:mx-3 xl:mx-4 lg:group-hover:font-bold lg:font-medium group-hover:text-primary font-normal dark:text-gray-200"
        type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
        aria-controls="drawer-navigation">
        <x-svg strokeWidth="1.2" stroke="currentColor" class="w-8 h-8" svg="menu-side" />
    </button>
</div>
<!-- drawer component default -->
<div id="drawer-navigation"
    class="fixed top-0 left-0 z-40 w-80 h-screen py-4 px-3 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-black"
    tabindex="-1">
    <h5 id="drawer-navigation-label" class="flex text-base font-bold text-gray-900 capitalize dark:text-gray-200">
        Study Club <span class="text-primary">&nbsp;Informatika</span>
    </h5>
    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
        class="text-gray-500 bg-gray-100 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-2 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white dark:bg-gray-900">
        <x-svg class="w-5 h-5" svg="close-sidebar" fill="none" strokeWidth="1.8" stroke="currentColor" />
        <span class="sr-only">Close menu</span>
    </button>
    <div class="py-4 overflow-y-auto">
        <ul class="font-medium space-y-3">
            <li class="mt-1 select-none">
                <h5 class="flex items-center font-semibold text-gray-900 capitalize dark:text-gray-200">
                    <x-auth-user />
                </h5>
                <h6 class="text-xs text-gray-500 dark:text-gray-400">
                    {{ auth()->user()->email }}
                </h6>
            </li>
            <div class="border border-gray-200 dark:border-gray-700 w-full"></div>
            <li>
                <x-side-navigation-link mode href="{{ route('home') }}">
                    <x-svg class="w-5 h-5" svg="home" fill="none" strokeWidth="1.5" stroke="currentColor" />
                    <span class="flex-1 whitespace-nowrap ml-1">Home</span>
                </x-side-navigation-link>
            </li>
            <div class="border border-gray-200 dark:border-gray-700 w-full"></div>
            <li>
                <x-side-navigation-link mode href="{{ route('dashboard') }}">
                    <x-svg class="w-5 h-5" svg="dashboard" fill="none" strokeWidth="1.5" stroke="currentColor" />
                    <span class="flex-1 whitespace-nowrap ml-1">Dashboard</span>
                </x-side-navigation-link>
            </li>
            <li>
                <x-side-navigation-link mode href="{{ route('biodata.index') }}">
                    <x-svg class="w-5 h-5" svg="biodata" fill="none" strokeWidth="1.5" stroke="currentColor" />
                    <span class="flex-1 whitespace-nowrap ml-1">Biodata</span>
                </x-side-navigation-link>
            </li>
            <li>
                <x-side-navigation-link mode href="{{ route('status.index') }}">
                    <x-svg class="w-5 h-5" svg="timeline" fill="currentColor" />
                    <span class="flex-1 whitespace-nowrap ml-1">Timeline</span>
                </x-side-navigation-link>
            </li>
            <li>
                <x-side-navigation-link mode href="{{ route('profile.edit') }}">
                    <x-svg class="w-5 h-5" svg="security" fill="none" strokeWidth="1.5" stroke="currentColor" />
                    <span class="flex-1 whitespace-nowrap ml-1">Security</span>
                </x-side-navigation-link>
            </li>
            <li>
                <x-side-navigation-link mode href="{{ route('tutorial.index') }}">
                    <x-svg class="w-5 h-5" svg="tutorial" fill="none" strokeWidth="1.5" stroke="currentColor" />
                    <span class="flex-1 whitespace-nowrap ml-1">Tutorial</span>
                </x-side-navigation-link>
            </li>
            <li>
                <x-side-navigation-link mode href="{{ route('help.index') }}">
                    <x-svg class="w-5 h-5" svg="help" fill="none" strokeWidth="1.5" stroke="currentColor" />
                    <span class="flex-1 whitespace-nowrap ml-1">Help</span>
                </x-side-navigation-link>
            </li>
            @hasanyrole(['operator', 'admin'])
                <div class="border border-gray-200 dark:border-gray-700 w-full"></div>
                <li>
                    <x-side-navigation-link mode href="{{ route('registrant.index') }}">
                        <x-svg class="w-5 h-5" svg="registrant-list" fill="none" strokeWidth="1.5"
                            stroke="currentColor" />
                        <span class="flex items-center whitespace-nowrap ml-1 gap-1">
                            Registrant List
                            <x-verified-icon type="operator" />
                        </span>
                    </x-side-navigation-link>
                </li>
            @endhasanyrole
            @hasrole('admin')
                <div class="border border-gray-200 dark:border-gray-700 w-full"></div>
                <li>
                    <x-side-navigation-link mode href="{{ route('operator.index') }}">
                        <x-svg class="w-5 h-5" svg="operator-list" fill="none" />
                        <span class="flex items-center whitespace-nowrap ml-1 gap-1">
                            Operator List
                            <x-verified-icon type="admin" />
                        </span>
                    </x-side-navigation-link>
                </li>
            @endhasrole
            <div class="border border-gray-200 dark:border-gray-700 w-full"></div>
            <li class="flex items-center justify-between gap-x-2">
                <div class="w-full">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="inline-flex w-full text-left text-gray-900 dark:text-gray-300">
                            <x-svg class="w-5 h-5" svg="logout" fill="none" strokeWidth="1.5"
                                stroke="currentColor" />
                            <span class="flex-1 whitespace-nowrap ml-1">Logout</span>
                        </button>
                    </form>
                </div>
                <div class=" ">
                    <x-theme-toggle btnId="responsive-theme-toggle" svgDarkId="responsive-theme-toggle-dark-icon"
                        svgLightId="responsive-theme-toggle-light-icon" />
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /Sidebar default --> --}}
