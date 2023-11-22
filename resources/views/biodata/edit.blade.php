<x-auth-layout title="Informasi Profil dan Biodata">
    <div class="space-y-3 min-[1440px]:space-y-3">
        <x-work-space>
            {{--  --}}
            @if ($errors->any())
                <div class="mb-4 flex rounded-lg bg-red-50 p-4 text-sm text-red-600 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <div>
                        <span class="font-medium">Oops, here's some error for you :</span>
                        <ul class="ml-4 mt-1.5 list-inside list-disc">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            {{--  --}}
            @hasanyrole(['operator', 'admin'])
                <div class="space-y-3 min-[1440px]:space-y-3">
                    <div class="flex w-full justify-between">
                        <x-header title="Profile " description="1">
                            <x-slot:header>
                                Perbarui profil informasi anda.
                            </x-slot:header>
                        </x-header>
                    </div>
                    <div class="mt-6 grid grid-cols-1 space-y-3 lg:grid-cols-12 lg:space-x-3 lg:space-y-0">
                        <div class="col-span-4 lg:mb-5 min-[1440px]:col-span-3 min-[1440px]:mb-0">
                            <div class="flex justify-center lg:mt-7">
                                @isset($user->picture)
                                    <img class="h-64 w-auto rounded-lg" src="{{ asset('storage/' . $user->picture) }}" alt="profile-picture">
                                @else
                                    <div class="animate-pulse space-y-8 md:flex md:items-center md:space-x-8 md:space-y-0" role="status">
                                        <div class="flex h-64 w-64 items-center justify-center rounded bg-gray-300 dark:bg-gray-700 md:w-52 min-[1440px]:w-64">
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
                            @include('biodata.partials.operator.update-operator-profile-information')
                        </div>
                    </div>
                </div>
            @else
                <div class="space-y-3 min-[1440px]:space-y-3">
                    <div class="flex w-full justify-between">
                        <x-header title="Informasi Pribadi dan Biodata" description="2">
                            @if ($open)
                                <x-slot:header>
                                    {{-- update your profile & biodata information to meet the registration requirements. --}}
                                    Perbarui informasi profil dan biodata anda untuk memenuhi syarat pedaftaran.
                                </x-slot:header>
                                <x-slot:body>
                                    <div>
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Profile Picture</h3>
                                        <p> your picture is one of our requirements, please upload your picture so we could identify you </p>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Account Information</h3>
                                        <p>
                                            you can change your name and email.
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Username</h3>
                                        <p>
                                            Username cannot be edited due to your registration requirements.
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Biodata</h3>
                                        <p>make sure to fill all biodata field</p>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Download</h3>
                                        <p>click menu button on the right to download and if you complete to fill all biodata field, please download it right now because when the registration is close you
                                            cant download it anymore.</p>
                                    </div>
                                </x-slot:body>
                            @else
                                <x-slot:header>
                                    <span class="text-red-500">
                                        Maaf, Pendaftaran saat ini telah ditutup. anda tidak bisa memperbarui dan mengunduh biodata.
                                    </span>
                                </x-slot:header>
                            @endif
                        </x-header>
                        @if ($user->has_verified == 0 && $open)
                            <x-header-menu-dropdown placement="bottom-end">
                                <x-slot:contents>
                                    @include('biodata.partials.registrant.reporting-menu')
                                </x-slot:contents>
                            </x-header-menu-dropdown>
                        @endif
                    </div>

                    <div class="mt-6 grid grid-cols-1 lg:grid-cols-12 lg:space-x-3 lg:space-y-0">
                        <div class="col-span-4 mb-3 lg:mb-5 min-[1440px]:col-span-2 min-[1440px]:mb-0">
                            @include('biodata.partials.registrant.image-preview')
                        </div>
                        <div class="col-span-8 lg:mb-5 min-[1440px]:col-span-6 min-[1440px]:mb-0">
                            @include('biodata.partials.registrant.update-profile-picture')
                        </div>
                        <div class="my-6 max-lg:border-b max-lg:border-b-gray-300 dark:max-lg:border-b-gray-600 lg:hidden">
                        </div>
                        <div class="col-span-full mb-6 min-[1440px]:col-span-4">
                            @include('biodata.partials.registrant.update-profile-information')
                        </div>
                    </div>
                    <div class="my-6 max-lg:border-b max-lg:border-b-gray-300 dark:max-lg:border-b-gray-600 lg:hidden">
                    </div>
                    @if ($open)
                        @isset($biodata)
                            @include('biodata.partials.registrant.update-biodata-information')
                        @else
                            <x-header title="Biodata" description="3">
                                <x-slot:header>
                                    <span class="text-green-400">
                                        {{ 'you need biodata for the next step!' }}
                                    </span>
                                </x-slot:header>
                            </x-header>
                            <div class="mt-2 flex items-center gap-4">
                                @include('biodata.partials.registrant.store-biodata-information')
                            </div>
                        @endisset
                    @endif
                </div>
            @endhasanyrole
        </x-work-space>
    </div>
    <script>
        // Profile Picture Preview 
        function previewImage() {
            const image = document.querySelector("#picture");
            const imgPreview = document.querySelector(".img_preview");

            imgPreview.style.display = "block";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };
        }
    </script>
</x-auth-layout>
