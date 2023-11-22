@inject('carbon', 'Carbon\Carbon')
<x-modal name="add-schedule" :show="$errors->scheduleDelition->isNotEmpty()" focusable>
    <form class="p-6" action="{{ route('schedule.store') }}" method="POST">
        @method('post')
        <x-header title="Buat Jadwal Kegiatan" description="10">
            <x-slot:header>
                Isi semua kolom dibawah ini dengan benar untuk menambah jadwal kegiatan.
            </x-slot:header>
        </x-header>
        @include('operator.schedule.partials._form-schedule')
        <div class="mt-6 flex justify-between gap-2 sm:justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button>
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
