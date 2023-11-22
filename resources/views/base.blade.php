<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ? $title . ' / SCI' : config('app.name') }}</title>
        <link type="image/x-icon" href="{{ asset('../storage/image/default/Sci-Logo.png') }}" rel="icon">

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <body class="antialiased">
        {{ $slot }}

        <script src="{{ asset('js/app.js') }}"></script>
    </body>

</html>
