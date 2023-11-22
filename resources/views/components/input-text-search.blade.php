@props(['placeholder'])

<input
    class="block w-full rounded-lg border border-gray-300 bg-white p-2.5 pl-10 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500 dark:border-gray-600 dark:bg-transparent dark:text-white dark:placeholder-gray-400 dark:focus:border-green-500 dark:focus:ring-green-500"
    id="simple-search" name="keyword" type="text" value="{{ request()->keyword }}" placeholder="{{ $placeholder }}" required>
