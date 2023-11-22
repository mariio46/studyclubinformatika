<li class="group flex">
    <button class="mx-0 flex w-full items-center py-2 text-sm font-normal text-gray-700 group-hover:text-primary dark:text-gray-200 lg:mx-3 lg:text-base lg:font-medium lg:group-hover:font-bold xl:mx-4"
        id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" data-dropdown-offset-distance="0" data-dropdown-offset-skidding="-95" type="button">
        <span class="sr-only">Open user menu</span>
        <x-svg class="h-8 w-8" strokeWidth="1.2" stroke="currentColor" svg="menu-side" />
    </button>
</li>
<div class="z-10 hidden w-52 divide-y divide-gray-200 rounded-lg border border-gray-200 bg-white shadow dark:divide-gray-600 dark:border-gray-700 dark:bg-black" id="dropdownAvatarName">
    <ul class="space-y-2 py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownAvatarNameButton">
        <li>
            <x-smartphone-dropdown-link href="{{ Request::routeIs('home') ? '/#home' : route('home') }}">
                <x-svg class="h-5 w-5" svg="home" fill="none" strokeWidth="1.5" stroke="currentColor" />
                Home
            </x-smartphone-dropdown-link>
        </li>
        <li>
            <x-smartphone-dropdown-link href="/#lessons">
                <x-svg class="h-5 w-5" svg="lessons" fill="none" strokeWidth="1.5" stroke="currentColor" />
                Lessons
            </x-smartphone-dropdown-link>
        </li>
        <li>
            <x-smartphone-dropdown-link href="/#devision">
                <x-svg class="h-5 w-5" svg="devisions" fill="none" strokeWidth="1.5" stroke="currentColor" />
                Devision
            </x-smartphone-dropdown-link>
        </li>
        <li>
            <x-smartphone-dropdown-link href="/#events">
                <x-svg class="h-5 w-5" svg="events" fill="none" strokeWidth="1.5" stroke="currentColor" />
                Events
            </x-smartphone-dropdown-link>
        </li>
        <li>
            <x-smartphone-dropdown-link href="/#galleries">
                <x-svg class="h-5 w-5" svg="galleries" fill="none" strokeWidth="1.5" stroke="currentColor" />
                Galleries
            </x-smartphone-dropdown-link>
        </li>
        <li class="flex pb-2 lg:items-center">
            <a class="mx-4 w-full rounded-md bg-gradient-to-bl from-black via-emerald-700 to-black px-4 py-1 text-center text-base font-bold text-white hover:bg-green-500 dark:border dark:border-gray-700 dark:bg-gradient-to-bl dark:from-teal-950 dark:via-black dark:to-teal-950 lg:mx-3 lg:py-2 xl:mx-4"
                href="{{ route('login') }}">
                Login
            </a>
        </li>
    </ul>
</div>
