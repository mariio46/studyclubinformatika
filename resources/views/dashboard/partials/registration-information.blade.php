<x-header title="Informasi Pendaftaran" description="2">
    <x-slot name="header">
        @if ($open)
            <span class="animate-pulse text-green-400">
                @unlessrole(['operator', 'admin'])
                    {{ 'Halo ' .auth()->user()->getNickname() .',' }}
                @endunlessrole
                Pendaftaran sekarang terbuka!
            </span>
        @else
            <span class="animate-pulse text-red-600">
                @unlessrole(['operator', 'admin'])
                    {{ 'Maaf ' .auth()->user()->getNickname() .',' }}
                @endunlessrole
                Pendaftaran saat ini telah ditutup!
            </span>
        @endif
    </x-slot>
</x-header>

@hasanyrole('operator|admin')
    <div class="mt-3 flex flex-wrap items-center gap-2">
        @role('admin')
            <div class="">
                <x-primary-link class="" href="{{ route('operator.index') }}">{{ __('More info') }}</x-primary-link>
            </div>
        @endrole

        @if ($open)
            <form action="{{ route('status.close') }}" method="post">
                @csrf
                @method('put')
                <div class="block gap-4 min-[500px]:flex min-[500px]:items-center">
                    <x-primary-button>{{ __('Tutup Pendafataran') }}</x-primary-button>
                </div>
            </form>
        @else
            <form action="{{ route('status.open') }}" method="post">
                @csrf
                @method('put')
                <div class="block gap-4 min-[500px]:flex min-[500px]:items-center">
                    <x-primary-button>{{ __('Buka Pendaftaran') }}</x-primary-button>
                </div>
            </form>
        @endif
    </div>
@endhasanyrole
{{-- <x-admin.registration-status /> --}}
