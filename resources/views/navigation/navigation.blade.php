<header class="absolute left-0 top-0 z-[39] flex w-full items-center bg-transparent" id="nav">
    <div class="@if (Request::routeIs('home')) container @else w-full px-3 sm:px-6 @endif">
        <div class="relative flex items-center justify-between">
            {{-- Logo --}}
            <div class="flex items-center">
                <div class="py-7">
                    <x-application-logo class="h-[1.35rem] w-auto text-black dark:text-white" />
                </div>
            </div>
            {{-- /Logo --}}

            <div class="flex items-center">
                {{-- Dekstop Menu --}}
                <nav class="absolute -right-1 top-full z-50 hidden w-full max-w-[250px] rounded-lg border border-gray-300 bg-white py-5 shadow-lg dark:border-gray-700 dark:bg-black lg:static lg:block lg:max-w-full lg:rounded-none lg:border-none lg:bg-transparent lg:shadow-none dark:lg:bg-transparent"
                    id="nav-menu">
                    <ul class="block lg:flex">
                        <x-primary-nav-link href="{{ Request::routeIs('home') ? '/#home' : route('home') }}" value="home" />
                        <x-primary-nav-link href="/#lessons" value="lessons" />
                        <x-primary-nav-link href="/#devision" value="devisions" />
                        <x-primary-nav-link href="/#events" value="events" />
                        <x-primary-nav-link href="/#galleries" value="galleries" />
                        {{-- Dekstop Dropdown Menu --}}
                        @auth
                            @include('navigation.partials.dekstop-dropdown-menu')
                        @else
                            <li class="mt-2 flex lg:mt-0 lg:items-center">
                                <a class="mx-4 w-full rounded-md bg-gradient-to-bl from-black via-emerald-700 to-black px-4 py-1 text-center text-base font-bold text-white hover:bg-green-500 dark:border dark:border-gray-700 dark:bg-gradient-to-bl dark:from-teal-950 dark:via-black dark:to-teal-950 lg:mx-3 lg:py-2 xl:mx-4"
                                    href="{{ route('login') }}">
                                    Login
                                </a>
                            </li>
                        @endauth
                        {{-- /Dekstop Dropdown Menu --}}
                    </ul>
                </nav>
                {{-- /Dekstop Menu --}}

                {{-- Smartphone Menu --}}
                @auth
                    <div class="lg:hidden">
                        @include('navigation.partials.side-navigation')
                    </div>
                @else
                    <div class="lg:hidden">
                        @include('navigation.partials.smartphone-dropdown-menu')
                    </div>
                @endauth
                {{-- /Smartphone Menu --}}
            </div>
        </div>
    </div>
</header>
