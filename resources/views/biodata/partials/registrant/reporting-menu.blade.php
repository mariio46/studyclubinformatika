<ul class="py-2 text-sm text-gray-700 dark:text-gray-200 space-y-2" aria-labelledby="dropdownMenuIconButton">
    <li class="px-3 space-y-1">
        <p class="text-xs lg:text-sm">Wait! If you access this site with smartphone, please
            click Tutorial
            first!</p>
        <x-primary-link class="w-full text-center justify-center " href="{{ route('tutorial.index') }}">
            Smartphone Tutorial
        </x-primary-link>
    </li>

    @if ($open)
        <li class="px-3 space-y-1">
            <p class="text-xs lg:text-sm">
                But if you access this site with laptop, you can just preview or download.
            </p>
            <x-primary-link class="w-full text-center justify-center " href="{{ route('user.biodata.index', $user) }}">
                Preview
            </x-primary-link>
            <x-primary-link class="w-full text-center justify-center " href="{{ route('user.biodata.print', $user) }}">
                Download
            </x-primary-link>
        </li>
    @endif
</ul>
