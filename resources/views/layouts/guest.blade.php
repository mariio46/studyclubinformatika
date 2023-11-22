<x-base-layouts>
    <main class="font-sans text-gray-900">
        <div class="flex min-h-screen flex-col items-center pt-6 dark:bg-black sm:justify-center sm:pt-0">
            @isset($header)
                {{ $header }}
            @endisset
            {{ $slot }}
        </div>

        @if (Request::routeIs('home'))
            @guest
                {{-- <x-guest-announcements title="This application is still on Alpha-Test" /> --}}
                <x-guest-announcements title="Halo teman-teman, pendaftaran telah dibuka. Ayo segera daftar sebelum ketinggalan." />
            @endguest
        @endif
    </main>
</x-base-layouts>
