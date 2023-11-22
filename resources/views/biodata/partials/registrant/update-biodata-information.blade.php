<form action="{{ route('biodata.update') }}" method="POST">
    @csrf
    @method('put')
    <div class="mb-3 mt-6 grid grid-cols-1 space-y-3 lg:grid-cols-12 lg:space-x-3 lg:space-y-0">
        <div class="col-span-6 space-y-3">
            <div>
                <x-input-label for="fullname" :value="__('nama lengkap')" />
                <x-text-input class="mt-1 block w-full" id="fullname" name="fullname" type="text" :value="old('fullname', $biodata->fullname)" autocomplete="fullname" placeholder="{{ $user->name . ' ...' }}" required />
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('fullname')" />
            </div>
            <div>
                <x-input-label for="whatsapp" :value="__('no. whatsapp')" />
                <x-text-input class="mt-1 block w-full" id="whatsapp" name="whatsapp" type="text" :value="old('whatsapp', $biodata->whatsapp)" autocomplete="whatsapp" placeholder="{{ '08xxxx' }}" required />
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('whatsapp')" />
            </div>
            <div>
                <x-input-label for="religion" :value="__('agama')" />
                <x-selections class="mt-1 block w-full" name="religion" title="religion" required>
                    <option selected disabled>Please choose religion</option>
                    @foreach ($religions as $religion)
                        <option value="{{ $religion['name'] }}" {{ $religion['name'] == $biodata->religion ? 'selected' : '' }}>
                            {{ $religion['name'] }}
                        </option>
                    @endforeach
                </x-selections>
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('religion')" />
            </div>
            <div>
                <x-input-label for="sex" :value="__('jenis kelamin')" />
                <x-selections class="mt-1 block w-full" name="sex" title="Jenis Kelamin" required>
                    <option selected disabled>Please choose gender</option>
                    @foreach ($genders as $gender)
                        <option value="{{ $gender['name'] }}" {{ $gender['name'] == $biodata->sex ? 'selected' : '' }}>
                            {{ $gender['name'] }}
                        </option>
                    @endforeach
                </x-selections>
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('sex')" />
            </div>
            <div>
                <x-input-label for="city" :value="__('kota lahir')" />
                <x-text-input class="mt-1 block w-full" id="city" name="city" type="text" :value="old('city', $biodata->city)" autocomplete="city" required />
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('city')" />
            </div>
            <div>
                <x-input-label for="birthday" :value="__('tanggal lahir')" />
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input
                        class="mt-1 block w-full rounded-md border-gray-300 p-2.5 pl-10 shadow-sm placeholder:text-sm placeholder:italic placeholder:text-slate-400 focus:border-green-500 focus:ring-green-500 disabled:text-gray-500 dark:border-gray-700 dark:bg-black dark:text-gray-300 dark:focus:border-green-600 dark:focus:ring-green-600"
                        id="birthday" name="birthday" type="text" value="{{ old('birthday', $biodata->birthday) }}" required datepicker datepicker-orientation="bottom right" datepicker-autohide
                        datepicker-format="yyyy/mm/dd" placeholder="Select date">
                </div>

                <x-input-error class="mt-1 text-xs" :messages="$errors->get('birthday')" />
            </div>
            <div>
                <x-input-label for="address" :value="__('alamat')" />
                <x-text-input class="mt-1 block w-full" id="address" name="address" type="text" :value="old('address', $biodata->address)" autocomplete="address" placeholder="{{ 'Jl.xxxx atau Nama Kota' }}" required />
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('address')" />
            </div>
            <div>
                <x-input-label for="university" :value="__('asal kampus')" />
                <x-text-input class="mt-1 block w-full" id="university" name="university" type="text" :value="old('university', $biodata->university)" autocomplete="university" placeholder="{{ 'ditulis dengan lengkap' }}"
                    required />
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('university')" />
            </div>
            <div>
                <x-input-label for="faculty" :value="__('fakultas')" />
                <x-text-input class="mt-1 block w-full" id="faculty" name="faculty" type="text" :value="old('faculty', $biodata->faculty)" autocomplete="faculty" autocomplete="faculty" required />
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('faculty')" />
            </div>
            <div>
                <x-input-label for="major" :value="__('jurusan')" />
                <x-text-input class="mt-1 block w-full" id="major" name="major" type="text" :value="old('major', $biodata->major)" autocomplete="major" required />
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('major')" />
            </div>
            <div>
                <x-input-label for="semester" :value="__('semester')" />
                <x-text-input class="mt-1 block w-full" id="semester" name="semester" type="text" :value="old('semester', $biodata->semester)" autocomplete="semester" placeholder="{{ '1 / 2 / 3 / 4 / 5 / 6 / 7 / 8' }}"
                    required />
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('semester')" />
            </div>
        </div>
        <div class="col-span-6 space-y-3">
            <div>
                <x-input-label for="father" :value="__('nama ayah')" />
                <x-text-input class="mt-1 block w-full" id="father" name="father" type="text" :value="old('father', $biodata->father)" autocomplete="father" required />
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('father')" />
            </div>
            <div>
                <x-input-label for="fatherWhatsapp" :value="__('nomor whatsapp / telepon ayah')" />
                <x-text-input class="mt-1 block w-full" id="fatherWhatsapp" name="fatherWhatsapp" type="text" :value="old('fatherWhatsapp', $biodata->fatherWhatsapp)" autocomplete="fatherWhatsapp"
                    placeholder="isi dengan ' - ' jika tidak punya nomor" required />
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('fatherWhatsapp')" />
            </div>
            <div>
                <x-input-label for="mother" :value="__('nama ibu')" />
                <x-text-input class="mt-1 block w-full" id="mother" name="mother" type="text" :value="old('mother', $biodata->mother)" autocomplete="mother" required />
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('mother')" />
            </div>
            <div>
                <x-input-label for="motherWhatsapp" :value="__('nomor whatsapp / telepon ibu')" />
                <x-text-input class="mt-1 block w-full" id="motherWhatsapp" name="motherWhatsapp" type="text" :value="old('motherWhatsapp', $biodata->motherWhatsapp)" autocomplete="motherWhatsapp"
                    placeholder="isi dengan ' - ' jika tidak punya nomor" required />
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('motherWhatsapp')" />
            </div>
            <div>
                <x-input-label for="vehicle" :value="__('Kendaraan Pribadi')" />
                <x-selections class="mt-1 block w-full" name="vehicle" autocomplete="vehicle" required>
                    <option selected disabled>Please choose one</option>
                    @foreach ($vehicleStatus as $vehicles)
                        <option value="{{ $vehicles['name'] }}" {{ $vehicles['name'] == $biodata->vehicle ? 'selected' : '' }}>
                            {{ $vehicles['name'] }}
                        </option>
                    @endforeach
                </x-selections>
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('vehicle')" />
            </div>
            <div>
                <x-input-label for="disease" :value="__('penyakit yang diderita / pantangan')" />
                <x-input-textarea class="mt-1 placeholder:text-sm placeholder:italic placeholder:text-slate-400" id="disease" name="disease" rows="5" autocomplete="disease"
                    placeholder="' asma, tidak bisa duduk dalam waktu lama... ' atau isi dengan ' - ' jika tidak ada" required>
                    {{ old('disease', $biodata->disease) }}</x-input-textarea>
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('disease')" />
            </div>
            <div>
                <x-input-label for="goals" :value="__('tujuan')" />
                <x-input-textarea class="mt-1 placeholder:text-sm placeholder:italic placeholder:text-slate-400" id="goals" name="goals" rows="5" autocomplete="goals"
                    placeholder="{{ 'Tujuan saya masuk di study club informatika karena...' }}" required>
                    {{ old('goals', $biodata->goals) }}</x-input-textarea>
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('goals')" />
            </div>
            <div>
                <x-input-label for="organizationsExp" :value="__('pengalaman organisasi')" />
                <x-input-textarea class="mt-1 placeholder:text-sm placeholder:italic placeholder:text-slate-400" id="organizationsExp" name="organizationsExp" rows="5"
                    autocomplete="organizationsExp" placeholder="' saya pernah masuk di (nama organisasi) selama... ' atau isi dengan ' - ' jika tidak ada" required>
                    {{ old('organizationsExp', $biodata->organizationsExp) }}</x-input-textarea>
                <x-input-error class="mt-1 text-xs" :messages="$errors->get('organizationsExp')" />
            </div>
        </div>
    </div>
    <div class="flex items-center justify-end gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>
