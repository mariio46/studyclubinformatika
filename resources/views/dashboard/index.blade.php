@php
    use Carbon\Carbon;
    Carbon::setlocale('id');
@endphp

<x-auth-layout title="Dashboard">
    <div class="space-y-3 min-[1440px]:space-y-3">
        @hasanyrole(['operator', 'admin'])
            <x-work-space>
                <x-header title="Informasi Autentikasi" description="1">
                    <x-slot:header>
                        <span class="text-green-500">
                            Selamat datang <strong class="capitalize">{{ implode(', ',auth()->user()->getRoleNames()->toArray()) }}</strong>.
                        </span>
                    </x-slot:header>
                </x-header>
            </x-work-space>
        @endhasanyrole

        <x-work-space>
            @include('dashboard.partials.registration-information')
        </x-work-space>

        @unlessrole(['operator', 'admin'])
            @if (!$user->update_biodata)
                <x-work-space class="animate-pulse border-red-500 dark:border-red-600">
                    <x-header title="Informasi Biodata {{ auth()->user()->getNickName() }}" description="1">
                        <x-slot:header>
                            <span class="font-medium text-red-500">
                                Anda belum memperbarui biodata anda, tekan link dibawah ini untuk menuju ke halaman Biodata untuk memperbaruinya sebelum pendaftaran ditutup.
                            </span>
                        </x-slot:header>
                    </x-header>

                    <div class="mt-3">
                        <x-primary-link href="{{ route('biodata.index') }}">{{ __('Perbarui Biodata') }}</x-primary-link>
                    </div>
                </x-work-space>
            @endif
        @endunlessrole

        <div class="grid grid-cols-1 space-y-3 min-[1440px]:grid-cols-12 min-[1440px]:space-x-3 min-[1440px]:space-y-0">
            <div class="col-span-4">
                <x-work-space>
                    @include('dashboard.partials.account-information')
                </x-work-space>
            </div>
            <div class="col-span-4">
                <x-work-space>
                    @include('dashboard.partials.security-information')
                </x-work-space>
            </div>
            <div class="col-span-4">
                <x-work-space>
                    @hasanyrole(['operator', 'admin'])
                        <x-header title="Timeline" description="5">
                            <x-slot:header>
                                <span class="text-green-500">
                                    Lihat Informasi Pendafataran.
                                </span>
                            </x-slot:header>
                        </x-header>
                        <div class="flex items-center">
                            <x-primary-link class="mt-2" href="{{ route('timeline') }}">check</x-primary-link>
                        </div>
                    @else
                        @include('dashboard.partials.biodata-information')
                    @endhasanyrole
                </x-work-space>
            </div>
        </div>

        @unlessrole(['operator', 'admin'])
            <x-work-space>
                <x-timeline :user="$user" />
            </x-work-space>
        @endunlessrole
    </div>
</x-auth-layout>
