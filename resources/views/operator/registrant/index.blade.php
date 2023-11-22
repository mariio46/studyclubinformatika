<x-auth-layout title="Registrant List">
    <x-work-space class="relative overflow-x-auto">
        <div class="item-center flex justify-between">
            <x-header title="List Pendaftar" description="1">
                <x-slot:header>
                    Total pendaftar saat ini : <strong>{{ $total }}</strong>
                </x-slot:header>
            </x-header>

            @if (!$open)
                <x-header-menu-dropdown placement="bottom-end">
                    <x-slot:contents>
                        @include('operator.registrant.partials.menu')
                    </x-slot:contents>
                </x-header-menu-dropdown>
            @endif
        </div>
        <div class="flex flex-wrap items-center justify-between">
            <div class="mt-2 max-w-sm space-y-1">
                @if ($open)
                    <span class="animate-pulse text-sm text-green-400">
                        Pendaftaran sekarang terbuka!
                    </span>
                    <form action="{{ route('status.close') }}" method="post">
                        @csrf
                        @method('put')
                        <div class="block gap-4 min-[500px]:flex min-[500px]:items-center">
                            <x-primary-button>{{ __('Tutup Pendafataran') }}</x-primary-button>
                        </div>
                    </form>
                @else
                    <span class="animate-pulse text-sm text-red-600">
                        Pendaftaran saat ini telah ditutup!
                    </span>
                    <form action="{{ route('status.open') }}" method="post">
                        @csrf
                        @method('put')
                        <div class="block gap-4 min-[500px]:flex min-[500px]:items-center">
                            <x-primary-button>{{ __('Buka Pendaftaran') }}</x-primary-button>
                        </div>
                    </form>
                @endif
            </div>
            <div class="mt-5 max-w-sm">
                <x-search-input-form :route="route('registrant.index')" placeholder="Cari pendaftar" />
            </div>
        </div>
        <div class="mt-5">
            <!-- relative class on main tag -->
            @include('operator.registrant.partials.items')
        </div>
    </x-work-space>
    @include('operator.registrant.partials.all-delete-modal')

</x-auth-layout>
