@csrf
<div class="mb-4 mt-6">
    <x-input-label for="name" :value="__('nama kegiatan')" />
    <x-text-input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name', $schedule->name)" autofocus autocomplete="off" />
    <x-input-error class="mt-2" :messages="$errors->get('name')" />
</div>
<div class="mb-4">
    <x-input-label for="location" :value="__('lokasi kegiatan')" />
    <x-text-input class="mt-1 block w-full" id="location" name="location" type="text" :value="old('location', $schedule->location)" autofocus autocomplete="off" />
    <x-input-error class="mt-2" :messages="$errors->get('location')" />
</div>
<div class="mb-4">
    <x-input-label for="time" :value="__('waktu kegiatan')" />
    <x-text-input class="mt-1 block w-full" id="time" name="time" type="time" :value="old('time', $carbon::parse($schedule?->time)->format('H:i'))" autofocus autocomplete="off" />
    <x-input-error class="mt-2" :messages="$errors->get('time')" />
</div>
<div class="grid grid-cols-1 gap-x-2 md:grid-cols-2">
    <div>
        <x-input-label for="date_start" :value="__('pada tanggal')" />
        <x-text-input class="mt-1 block w-full" id="date_start" name="date_start" type="date" :value="old('date_start', $schedule->date_start)" autofocus autocomplete="off" />
        <x-input-error class="mt-2" :messages="$errors->get('date_start')" />
    </div>
    <div>
        <x-input-label for="date_end" :value="__('hingga')" />
        <x-text-input class="mt-1 block w-full" id="date_end" name="date_end" type="date" :value="old('date_end', $schedule->date_end)" autofocus autocomplete="off" />
        <x-input-error class="mt-2" :messages="$errors->get('date_end')" />
    </div>
</div>
