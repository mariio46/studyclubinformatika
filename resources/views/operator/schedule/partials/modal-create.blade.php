<x-modal name="add-schedule" :show="$errors->scheduleDelition->isNotEmpty()" focusable>
    <form class="p-6" action="{{ route('schedule.store') }}" method="POST">
        @csrf
        @method('post')
        <x-header title="Buat Jadwal Kegiatan" description="10">
            <x-slot:header>
                Isi semua kolom dibawah ini dengan benar untuk menambah jadwal kegiatan.
            </x-slot:header>
        </x-header>
        <div class="mb-4 mt-6">
            <x-input-label for="name" :value="__('nama kegiatan')" />
            <x-text-input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name')" autofocus autocomplete="off" />
            <x-input-error class="mt-2" :messages="$errors->scheduleDelition->get('name')" />
        </div>
        <div class="mb-4">
            <x-input-label for="location" :value="__('lokasi kegiatan')" />
            <x-text-input class="mt-1 block w-full" id="location" name="location" type="text" :value="old('location')" autofocus autocomplete="off" />
            <x-input-error class="mt-2" :messages="$errors->scheduleDelition->get('location')" />
        </div>
        <div class="mb-4">
            <x-input-label for="time" :value="__('waktu kegiatan')" />
            <x-text-input class="mt-1 block w-full" id="time" name="time" type="time" :value="old('time')" autofocus autocomplete="off" />
            <x-input-error class="mt-2" :messages="$errors->scheduleDelition->get('time')" />
        </div>
        <div class="grid grid-cols-1 gap-x-2 md:grid-cols-2">
            <div>
                <x-input-label for="date_start" :value="__('pada tanggal')" />
                <x-text-input class="mt-1 block w-full" id="date_start" name="date_start" type="date" :value="old('date_start')" autofocus autocomplete="off" />
                <x-input-error class="mt-2" :messages="$errors->scheduleDelition->get('date_start')" />
            </div>
            <div>
                <x-input-label for="date_end" :value="__('hingga')" />
                <x-text-input class="mt-1 block w-full" id="date_end" name="date_end" type="date" :value="old('date_end')" autofocus autocomplete="off" />
                <x-input-error class="mt-2" :messages="$errors->scheduleDelition->get('date_end')" />
            </div>
        </div>
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
