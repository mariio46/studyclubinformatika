<x-auth-layout title="Timeline">
    <x-work-space>
        @hasanyrole(['operator', 'admin'])
            <div id="operator-accordion" data-accordion="collapse" data-active-classes="dark:bg-transparent text-gray-900 dark:text-white">
                <h2 id="operator-accordion-heading-1">
                    <button
                        class="flex w-full items-center justify-between text-left font-medium text-gray-500 hover:bg-white focus:ring-0 focus:ring-white dark:border-gray-700 dark:text-gray-400 dark:hover:bg-transparent dark:focus:ring-0"
                        data-accordion-target="#operator-accordion-body-1" type="button" aria-expanded="true" aria-controls="operator-accordion-body-1">
                        <span>
                            <x-header title="Informarsi Pendaftaran">
                                <x-slot:header>
                                    Semua informasi mengenai pendaftaran.
                                </x-slot:header>
                            </x-header>
                        </span>
                        <svg class="h-3 w-3 shrink-0 rotate-180" data-accordion-icon aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div class="mt-5 hidden" id="operator-accordion-body-1" aria-labelledby="operator-accordion-heading-1">
                    <div>
                        <ol class="relative border-l border-gray-200 dark:border-gray-700">
                            <li class="mb-10 ml-4">
                                <div class="absolute -left-1.5 mt-1.5 h-3 w-3 rounded-full border border-white bg-green-400 dark:border-green-900 dark:bg-green-400">
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    Total Pendaftar : {{ App\Models\User::doesntHave('roles')->count() }}
                                </h3>
                                <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    Total pendaftar yang telah melakukan registrasi.
                                </p>
                            </li>
                            <li class="mb-10 ml-4">
                                <div class="absolute -left-1.5 mt-1.5 h-3 w-3 rounded-full border border-white bg-green-400 dark:border-green-900 dark:bg-green-400">
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    Pendaftar yang sudah memiliki biodata :
                                    {{ App\Models\User::doesntHave('roles')->has('biodata')->count() }}
                                </h3>
                                <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    Total pendaftar yang sudah memiliki biodata.
                                </p>
                            </li>
                            <li class="mb-10 ml-4">
                                <div class="absolute -left-1.5 mt-1.5 h-3 w-3 rounded-full border border-white bg-green-400 dark:border-green-900 dark:bg-green-400">
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    Pendaftar yang belum memiliki biodata :
                                    {{ App\Models\User::doesntHave('roles')->doesntHave('biodata')->count() }}
                                </h3>
                                <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    Total pendaftar yang belum memiliki biodata.
                                </p>
                            </li>
                            <li class="mb-10 ml-4">
                                <div class="absolute -left-1.5 mt-1.5 h-3 w-3 rounded-full border border-white bg-green-400 dark:border-green-900 dark:bg-green-400">
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    Pendaftar terverifikasi :
                                    {{ App\Models\User::doesntHave('roles')->where('has_verified', 1)->count() }}
                                </h3>
                                <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    Total pendaftar yang telah mengikuti proses wawancara dan telah diverifikasi oleh operator.
                                </p>
                            </li>
                            <li class="mb-10 ml-4">
                                <div class="absolute -left-1.5 mt-1.5 h-3 w-3 rounded-full border border-white bg-green-400 dark:border-green-900 dark:bg-green-400">
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    Pendaftar yang belum diverifikasi :
                                    {{ App\Models\User::doesntHave('roles')->where('has_verified', 0)->count() }}
                                </h3>
                                <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    Total pendaftar yang belum mengikuti wawancara dan tidak diverifikasi oleh operator.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        @else
            @php
                $user = auth()->user()->timeline;
            @endphp
            <x-timeline :user="$user" />
        @endhasanyrole
    </x-work-space>
</x-auth-layout>
