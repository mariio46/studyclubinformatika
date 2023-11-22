<li class="group flex">
    <button class="mx-4 flex w-full items-center py-2 text-sm font-normal text-gray-700 group-hover:text-primary dark:text-gray-200 lg:mx-3 lg:text-base lg:font-medium lg:group-hover:font-bold xl:mx-4"
        id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" data-dropdown-offset-distance="0" data-dropdown-offset-skidding="-110" type="button">
        <span class="sr-only">Open user menu</span>
        <span class="flex items-center group-hover:font-medium group-hover:text-gray-700 dark:group-hover:text-white">
            <x-auth-user />
        </span>
        <x-svg class="ml-2.5 h-2.5 w-2.5" viewBox="0 0 10 6" svg="menu-dropdown" />
    </button>
</li>
<div class="z-10 hidden w-[17rem] divide-y divide-gray-200 rounded-lg border border-gray-200 bg-white shadow dark:divide-gray-600 dark:border-gray-600 dark:bg-black" id="dropdownAvatarName">
    <div class="select-none px-4 py-4 text-sm">
        <div class="font-medium text-gray-900 dark:text-white">{{ auth()->user()->getNickName() }}</div>
        <div class="truncate text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</div>
    </div>
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownAvatarNameButton">
        <li>
            <x-side-navigation-link href="{{ route('home') }}">
                <x-svg class="h-5 w-5" svg="home" fill="none" strokeWidth="1.5" stroke="currentColor" />
                Home
            </x-side-navigation-link>
        </li>
    </ul>
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownAvatarNameButton">
        <li>
            <x-side-navigation-link href="{{ route('dashboard') }}">
                <x-svg class="h-5 w-5" svg="dashboard" fill="none" strokeWidth="1.5" stroke="currentColor" />
                Dashboard
            </x-side-navigation-link>
        </li>
        <li>
            <x-side-navigation-link href="{{ route('biodata.index') }}">
                <x-svg class="h-5 w-5" svg="biodata" fill="none" strokeWidth="1.5" stroke="currentColor" />
                @hasanyrole(['operator', 'admin'])
                    Profile
                @else
                    Biodata
                @endhasanyrole
            </x-side-navigation-link>
        </li>
        <li>
            <x-side-navigation-link href="{{ route('timeline') }}">
                <x-svg class="h-5 w-5" svg="timeline" strokeWidth="1.5" stroke="currentColor" />
                Timeline
            </x-side-navigation-link>
        </li>
        <li>
            <x-side-navigation-link href="{{ route('profile.edit') }}">
                <x-svg class="h-5 w-5" svg="security" fill="none" strokeWidth="1.5" stroke="currentColor" />
                Security
            </x-side-navigation-link>
        </li>
        <li>
            <x-side-navigation-link href="{{ route('tutorial') }}">
                <x-svg class="h-5 w-5" svg="tutorial" fill="none" strokeWidth="1.5" stroke="currentColor" />
                Tutorial
            </x-side-navigation-link>
        </li>
        <li>
            <x-side-navigation-link href="{{ route('help') }}">
                <x-svg class="h-5 w-5" svg="help" fill="none" strokeWidth="1.5" stroke="currentColor" />
                Help
            </x-side-navigation-link>
        </li>
    </ul>
    @hasanyrole(['operator', 'admin'])
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
            <li>
                <x-side-navigation-link class="justify-between" href="{{ route('registrant.index') }}">
                    <div class="flex gap-x-1">
                        <x-svg class="h-5 w-5" svg="registrant-list" fill="none" strokeWidth="1.5" stroke="currentColor" />
                        Registrant List
                    </div>
                    <x-verified-icon type="operator" />
                </x-side-navigation-link>

                <x-side-navigation-link class="justify-between" href="{{ route('schedule.index') }}">
                    {{-- <x-svg class="w-5 h-5" svg="schedule" fill="none" strokeWidth="1.5" stroke="currentColor" />
                    Schedules --}}
                    <div class="flex gap-x-1">
                        <x-svg class="h-5 w-5" svg="schedule" fill="none" strokeWidth="1.5" stroke="currentColor" />
                        Schedules
                    </div>
                    <x-verified-icon type="operator" />
                </x-side-navigation-link>
            </li>
        </ul>
    @endhasanyrole
    @role('admin')
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
            <li>
                <x-side-navigation-link class="justify-between" href="{{ route('operator.index') }}">
                    <div class="flex gap-x-1">
                        <x-svg class="h-5 w-5" svg="operator-list" fill="none" strokeWidth="1.5" stroke="currentColor" />
                        Operator List
                    </div>
                    <x-verified-icon type="admin" />
                </x-side-navigation-link>
            </li>
        </ul>
    @endrole
    <div class="flex items-center justify-between gap-x-2 py-2">
        <form class="w-full" method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                class="flex w-full items-center gap-x-1 px-4 py-2 text-left text-sm text-gray-800 hover:bg-gray-100 hover:font-semibold hover:text-red-600 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-red-600"
                type="submit">
                <x-svg class="h-5 w-5" svg="logout" fill="none" strokeWidth="1.5" stroke="currentColor" />
                Logout
            </button>
        </form>
        <div>
            <x-theme-toggle btnId="theme-toggle" svgDarkId="theme-toggle-dark-icon" svgLightId="theme-toggle-light-icon" />
        </div>
    </div>
</div>
