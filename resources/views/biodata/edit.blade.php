<x-auth-layout title="Profil & Biodata Information">
    <div class="space-y-3 min-[1440px]:space-y-3">
        <x-work-space>
            <div class="space-y-3 min-[1440px]:space-y-3">
                <div class="flex w-full justify-between">
                    <x-dashboard.header title="Profile and Biodata" description="1">
                        @if ($open)
                            <x-slot:header>
                                update your profile & biodata information to meet the registration requirements.
                            </x-slot:header>
                            <x-slot:body>
                                <div>
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Profile Picture</h3>
                                    <p>
                                        your picture is one of our requirements, please upload your picture so we
                                        could
                                        identify
                                        you
                                    </p>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Account Information</h3>
                                    <p>
                                        you can change your Name, Username, and Email.
                                    </p>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Biodata</h3>
                                    <p>make sure to fill all biodata field</p>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Download</h3>
                                    <p>click menu button on the right to download and if you complete to fill all
                                        biodata
                                        field, please download it right now because when the registration is close
                                        you
                                        cant
                                        download it anymore.</p>
                                </div>
                            </x-slot:body>
                        @else
                            <x-slot:header>
                                @hasanyrole(['operator', 'admin'])
                                    <span class="text-green-500">
                                        Update your profile information.
                                    </span>
                                @else
                                    <span class="text-red-500">
                                        Sorry, Registrtion is close. you can update profile but not biodata.
                                    </span>
                                @endhasanyrole
                            </x-slot:header>
                        @endif
                    </x-dashboard.header>
                    @unlessrole(['operator', 'admin'])
                        <x-header-menu-dropdown>
                            <x-slot:contents>
                                @include('biodata.partials.reporting-menu')
                            </x-slot:contents>
                        </x-header-menu-dropdown>
                    @endunlessrole
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 lg:space-y-0 lg:space-x-3 mt-6">
                    <div class="col-span-4 min-[1440px]:col-span-2 mb-3 lg:mb-5 min-[1440px]:mb-0">
                        @include('biodata.partials.image-preview')
                    </div>
                    <div class="col-span-8 min-[1440px]:col-span-6 lg:mb-5 min-[1440px]:mb-0">
                        @include('biodata.partials.update-profile-picture')
                    </div>
                    <div class="my-6 max-lg:border-b max-lg:border-b-gray-300 dark:max-lg:border-b-gray-600 lg:hidden">
                    </div>
                    <div class="col-span-full min-[1440px]:col-span-4 mb-6">
                        @include('biodata.partials.update-profile-information')
                    </div>
                </div>
                @unlessrole(['operator', 'admin'])
                    <div class="my-6 max-lg:border-b max-lg:border-b-gray-300 dark:max-lg:border-b-gray-600 lg:hidden">
                    </div>
                    @if ($open)
                        @isset($biodata)
                            @include('biodata.partials.update-biodata-information')
                        @else
                            <x-dashboard.header title="Biodata" description="3">
                                <x-slot:header>
                                    <span class="text-green-400">
                                        {{ 'you need biodata for the next step!' }}
                                    </span>
                                </x-slot:header>
                            </x-dashboard.header>
                            <div class="flex items-center gap-4 mt-2">
                                @include('biodata.partials.store-biodata-information')
                            </div>
                        @endisset
                    @endif
                @endunlessrole
            </div>
        </x-work-space>
    </div>
</x-auth-layout>
