@php
    use Carbon\Carbon;
    Carbon::setlocale('id');
@endphp
<x-auth-layout>
    <div class="space-y-3">
        <x-work-space>
            @include('operator.registrant.partials.registrant-timeline')
        </x-work-space>
        <x-work-space>
            <div class="space-y-6">
                <div>
                    <x-header title="{{ $registrant->name . ' Information' }}" description="1">
                        <x-slot:header>
                            this is a full information of {{ $registrant->getNickname() }}.
                        </x-slot:header>
                    </x-header>
                    <div class="mt-6 grid grid-cols-1 space-y-3 lg:grid-cols-12 lg:space-x-3 lg:space-y-0">
                        <div class="col-span-4 lg:mb-5 min-[1440px]:col-span-3 min-[1440px]:mb-0">
                            <div class="flex justify-center lg:mt-7">
                                @isset($registrant->picture)
                                    <img class="h-64 w-auto rounded-lg" src="{{ asset('storage/' . $registrant->picture) }}" alt="profile-picture">
                                @else
                                    <div class="animate-pulse space-y-8 md:flex md:items-center md:space-x-8 md:space-y-0" role="status">
                                        <div class="flex h-64 w-64 items-center justify-center rounded bg-gray-300 dark:bg-gray-700 md:w-48 min-[1440px]:w-40">
                                            <svg class="h-10 w-10 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                <path
                                                    d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                                            </svg>
                                        </div>
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                @endisset
                            </div>
                        </div>
                        <div class="col-span-8 lg:mb-5 min-[1440px]:col-span-9 min-[1440px]:mb-0">
                            <div class="mb-2">
                                <x-input-label for="name" :value="__('name')" />
                                <x-text-input class="mt-1 block w-full" id="created_at" disabled :value="old('created_at', $registrant->name)" />
                            </div>
                            <div class="mb-2">
                                <x-input-label for="username" :value="__('username')" />
                                <x-text-input class="mt-1 block w-full" id="created_at" disabled :value="old('created_at', $registrant->username)" />
                            </div>
                            <div class="mb-4">
                                <x-input-label for="email" :value="__('email')" />
                                <x-text-input class="mt-1 block w-full" id="created_at" disabled :value="old('created_at', $registrant->email)" />
                            </div>
                            <div class="mb-4">
                                <x-input-label for="created_at" :value="__('Joined')" />
                                <x-text-input class="mt-1 block w-full" id="created_at" disabled :value="old('created_at', $registrant->created_at->format('d F Y'))" />
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    @isset($registrant->biodata)
                        <div class="mb-3 mt-6 grid grid-cols-1 space-y-3 lg:grid-cols-12 lg:space-x-3 lg:space-y-0">
                            <div class="col-span-6 space-y-3">
                                <div>
                                    <x-input-label for="fullname" :value="__('nama lengkap')" />
                                    <x-text-input class="mt-1 block w-full" id="fullname" disabled :value="$registrant->biodata->fullname" />
                                </div>
                                <div>
                                    <x-input-label for="whatsapp" :value="__('no. whatsapp')" />
                                    <x-text-input class="mt-1 block w-full" id="whatsapp" disabled :value="$registrant->biodata->whatsapp" />
                                </div>
                                <div>
                                    <x-input-label for="religion" :value="__('agama')" />
                                    <x-text-input class="mt-1 block w-full" id="religion" disabled :value="$registrant->biodata->religion" />
                                </div>
                                <div>
                                    <x-input-label for="sex" :value="__('jenis kelamin')" />
                                    <x-text-input class="mt-1 block w-full" id="sex" disabled :value="$registrant->biodata->sex" />
                                </div>
                                <div>
                                    <x-input-label for="city" :value="__('kota lahir')" />
                                    <x-text-input class="mt-1 block w-full" id="city" disabled :value="$registrant->biodata->city" />
                                </div>
                                <div>
                                    <x-input-label for="birthday" :value="__('tanggal lahir')" />
                                    <x-text-input class="mt-1 block w-full" id="birthday" disabled :value="$registrant->biodata->birthday" />
                                </div>
                                <div>
                                    <x-input-label for="address" :value="__('alamat')" />
                                    <x-text-input class="mt-1 block w-full" id="address" disabled :value="$registrant->biodata->address" />
                                </div>
                                <div>
                                    <x-input-label for="university" :value="__('asal kampus')" />
                                    <x-text-input class="mt-1 block w-full" id="university" disabled :value="$registrant->biodata->university" />
                                </div>
                                <div>
                                    <x-input-label for="faculty" :value="__('fakultas')" />
                                    <x-text-input class="mt-1 block w-full" id="faculty" disabled :value="$registrant->biodata->faculty" />
                                </div>
                                <div>
                                    <x-input-label for="major" :value="__('jurusan')" />
                                    <x-text-input class="mt-1 block w-full" id="major" disabled :value="$registrant->biodata->major" />
                                </div>
                                <div>
                                    <x-input-label for="semester" :value="__('semester')" />
                                    <x-text-input class="mt-1 block w-full" id="semester" disabled :value="$registrant->biodata->semester" />
                                </div>
                            </div>
                            <div class="col-span-6 space-y-3">
                                <div>
                                    <x-input-label for="father" :value="__('nama ayah')" />
                                    <x-text-input class="mt-1 block w-full" id="father" disabled :value="$registrant->biodata->father" />
                                </div>
                                <div>
                                    <x-input-label for="fatherWhatsapp" :value="__('nomor whatsapp / telepon ayah')" />
                                    <x-text-input class="mt-1 block w-full" id="fatherWhatsapp" disabled :value="$registrant->biodata->fatherWhatsapp" />
                                </div>
                                <div>
                                    <x-input-label for="mother" :value="__('nama ibu')" />
                                    <x-text-input class="mt-1 block w-full" id="mother" disabled :value="$registrant->biodata->mother" />
                                </div>
                                <div>
                                    <x-input-label for="motherWhatsapp" :value="__('nomor whatsapp / telepon ibu')" />
                                    <x-text-input class="mt-1 block w-full" id="motherWhatsapp" disabled :value="$registrant->biodata->motherWhatsapp" />
                                </div>
                                <div>
                                    <x-input-label for="vehicle" :value="__('Kendaraan Pribadi')" />
                                    <x-text-input class="mt-1 block w-full" id="vehicle" disabled :value="$registrant->biodata->vehicle" />
                                </div>
                                <div>
                                    <x-input-label for="disease" :value="__('penyakit yang diderita / pantangan')" />
                                    <x-input-textarea class="mt-1 placeholder:italic" id="disease" disabled rows="5">
                                        {{ $registrant->biodata->disease }}</x-input-textarea>
                                </div>
                                <div>
                                    <x-input-label for="goals" :value="__('tujuan')" />
                                    <x-input-textarea class="mt-1 placeholder:italic" id="goals" disabled rows="5">
                                        {{ $registrant->biodata->goals }}</x-input-textarea>
                                </div>
                                <div>
                                    <x-input-label for="organizationsExp" :value="__('pengalaman organisasi')" />
                                    <x-input-textarea class="mt-1 placeholder:italic" id="organizationsExp" disabled rows="5">
                                        {{ $registrant->biodata->organizationsExp }}</x-input-textarea>
                                </div>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </x-work-space>
    </div>
</x-auth-layout>
