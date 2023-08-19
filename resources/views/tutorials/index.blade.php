<x-auth-layout title="Smartphone Tutorials">
    <x-work-space>
        <div class="space-y-3">
            <x-dashboard.header title="How to download your biodata on smartphone" description="1">
                <x-slot:header>
                    Use this tutorials if you are using mobile or tablet.
                </x-slot:header>
            </x-dashboard.header>

            <div class="px-2">
                <div id="accordion-flush" data-accordion="collapse"
                    data-active-classes="bg-white dark:bg-transparent text-gray-900 dark:text-white"
                    data-inactive-classes="text-gray-500 dark:text-gray-300">
                    <h2 id="accordion-flush-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-300"
                            data-accordion-target="#accordion-flush-body-1" aria-expanded="false"
                            aria-controls="accordion-flush-body-1">
                            <span>On Android</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            {{-- <h3 class="text-base font-medium text-gray-800 mb-1">Cara save formulir PDF di Smartphone :</h3> --}}
                            <ol class="list-disc text-sm ml-5 text-gray-600 dark:text-gray-400 space-y-2">
                                <li>Tekan tombol cetak yang ada dimenu</li>
                                {{-- <div class="w-full flex justify-center bg-red-100"> --}}
                                {{-- <img src="{{ asset('storage/image/default/sci-logo-full.png') }}" alt="" class="w-40 h-4w-40"> --}}
                                {{-- </div> --}}
                                <li>Setelah jendela print terbuka, ubah destination menjadi Save as PDF</li>
                                <li>Ganti ukuran kertas menjadi F4</li>
                                <li>Lalu klik tombol unduh ke PDF</li>
                                <li>Setelah itu isikan nama file PDF lalu klik Save</li>
                            </ol>
                        </div>
                    </div>
                    <h2 id="accordion-flush-heading-2">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-300"
                            data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                            aria-controls="accordion-flush-body-2">
                            <span>On Iphone</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            {{-- <h3 class="text-base font-medium text-gray-800 mb-1">Cara save formulir PDF di Smartphone :</h3> --}}
                            <ol class="list-disc text-sm ml-5 text-gray-600 dark:text-gray-400 space-y-2">
                                <li>Tekan tombol cetak yang ada dimenu</li>
                                {{-- <div class="w-full flex justify-center bg-red-100"> --}}
                                {{-- <img src="{{ asset('storage/image/default/sci-logo-full.png') }}" alt="" class="w-40 h-4w-40"> --}}
                                {{-- </div> --}}
                                <li>Setelah jendela print terbuka, ubah destination menjadi Save as PDF</li>
                                <li>Ganti ukuran kertas menjadi F4</li>
                                <li>Lalu klik tombol unduh ke PDF</li>
                                <li>Setelah itu isikan nama file PDF lalu klik Save</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-work-space>
</x-auth-layout>
