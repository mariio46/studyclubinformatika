<!DOCTYPE html>
<html class="h-full" lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="h-full antialiased">
        <main
            class="font-inter grid min-h-full place-items-center bg-gradient-to-bl from-teal-100 via-white to-teal-100 px-6 py-24 dark:bg-gradient-to-bl dark:from-teal-950 dark:via-black dark:to-teal-950 sm:py-32 lg:px-8">
            <div class="text-center">
                <p class="text-base font-semibold text-emerald-600 dark:text-emerald-400">@yield('code')</p>
                <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-100 sm:text-5xl">
                    @yield('message')
                </h1>
                <p class="mt-6 text-base leading-7 text-gray-600 dark:text-gray-400">Go back and fill the rest of field.</p>
                <div class="mt-10 flex items-center justify-center gap-x-3">
                    <a class="rounded-md bg-emerald-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600"
                        href="{{ url()->previous() }}">
                        Back
                    </a>
                    @auth
                        <a class="rounded-md bg-emerald-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600"
                            href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    @else
                        <a class="rounded-md bg-emerald-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600"
                            href="{{ route('home') }}">
                            Home
                        </a>
                    @endauth
                </div>
            </div>
        </main>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>

</html>
