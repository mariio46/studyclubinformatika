<div class="py-2 text-sm text-gray-700 dark:text-gray-200 border-t border-t-gray-200 dark:border-gray-700">
    @if ($registrants->where('has_verified', 0)->first())
        <form action="{{ route('registrant.unverified.delete') }}" method="post" class="">
            @csrf
            @method('delete')
            <div class="flex items-center">
                <button type="submit" class="w-full text-left"
                    onclick="return confirm('Are you sure want to delete unverified registrants?')">
                    <span
                        class="font-medium text-red-600 hover:underline block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        Delete unverified registrants
                    </span>
                </button>
            </div>
        </form>
    @endif

    <button type="submit" class="w-full text-left" x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-delete-all-registrants')">
        <span
            class="font-medium text-red-600 hover:underline block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
            Delete all registrants
        </span>
    </button>
</div>
