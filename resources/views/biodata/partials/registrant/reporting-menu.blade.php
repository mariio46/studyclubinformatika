@php
    $code = mt_rand(1, 999999);
@endphp
<ul class="space-y-2 py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
    <li class="space-y-1 px-3">
        <p class="text-xs lg:text-sm">
            {{-- Here's some tutorial for download biodata, in case you need! --}}
            Jika anda butuh panduan, klik tombol "Tutorial" dibawah ini.
        </p>
        <x-primary-link class="w-full justify-center text-center" href="{{ route('tutorial') }}">
            Tutorial
        </x-primary-link>
    </li>

    <li class="space-y-1 px-3">
        <x-primary-link class="w-full justify-center text-center" href="{{ route('biodata.export.preview', $user) }}" target="_blank" rel="noopener noreferrer">
            <x-svg class="mr-1 h-6 w-6" svg="pdf" strokeWidth="1.5" stroke="currentColor" />
            Preview
        </x-primary-link>
    </li>
</ul>
