@php
    $code = mt_rand(1, 999999);
@endphp
<ul class="py-2 text-sm text-gray-700 dark:text-gray-200 space-y-2" aria-labelledby="dropdownMenuIconButton">
    <li class="px-3 space-y-1">
        <p class="text-xs lg:text-sm">Wait! If you access this site with smartphone, please
            click Tutorial
            first!</p>
        <x-primary-link class="w-full text-center justify-center " href="{{ route('tutorial.index') }}">
            Smartphone Tutorial
        </x-primary-link>
    </li>

    <li class="px-3 space-y-1">
        <p class="text-xs lg:text-sm">
            But if you access this site with laptop, you can just preview or download.
        </p>
        <x-primary-link class="w-full text-center justify-center" href="{{ route('biodata.export.preview', $user) }}"
            target="_blank" rel="noopener noreferrer">
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
        </x-primary-link>
    </li>
</ul>
