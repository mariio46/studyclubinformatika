<div class="w-full">
    <form action="{{ route('biodata.picture.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <x-input-label for="picture" :value="__('profile picture')" />
        <div class="mb-3 mt-1">
            <input name="oldPicture" type="hidden" value="{{ $user->picture }}">
            <input
                class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:mr-4 file:rounded-full file:border-0 file:bg-violet-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-violet-700 hover:file:bg-violet-100 focus:outline-none dark:border-gray-600 dark:bg-black dark:text-gray-400 dark:placeholder-gray-400"
                id="picture" name="picture" type="file" aria-describedby="file_input_help" required onchange="previewImage()">
            @if ($errors->get('picture'))
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('picture')" />
            @else
                <p class="mt-1 text-[0.65rem] text-gray-500 dark:text-gray-300" id="file_input_help">
                    PNG, JPG or JPEG (MAX. 1MB).
                </p>
            @endif
        </div>
        <div class="flex items-center gap-4 max-lg:justify-end">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</div>
