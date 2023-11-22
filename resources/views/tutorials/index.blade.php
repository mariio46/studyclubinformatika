<x-auth-layout title="Tutorials">
    <x-work-space>
        <div class="space-y-3">
            <x-header title="Tutorial download biodata di setiap perangkat" description="1">
                <x-slot:header>
                    {{-- here's some tutorials, in case you need help. --}}
                    Berikut tutorial download biodata di setiap perangkat, jika anda butuh.
                </x-slot:header>
            </x-header>

            <div class="px-2">
                <x-accordion name="tutorial">
                    <x-accordion-head heading="computer-heading" body="computer-body" show="false">
                        Tutorial di Pc / Laptop
                    </x-accordion-head>
                    <x-accordion-body heading="computer-heading" body="computer-body">
                        <ol class="ml-5 list-disc space-y-2 text-sm text-gray-600 dark:text-gray-400 lg:text-base">
                            <li>Pada menu biodata tekan icon titik 3 di kanan atas</li>
                            <img class="w-full lg:w-3/4" src="https://github.com/mariio46/asset-static-sci/blob/master/tutorial/laptop/1.png?raw=true" alt="tutorial 1 laptop">
                            <li>Pilih preview</li>
                            <img class="w-full lg:w-3/4" src="https://github.com/mariio46/asset-static-sci/blob/master/tutorial/laptop/2.png?raw=true" alt="tutorial 2 laptop">
                            <li>Anda akan diberi 2 opsi, pilih download secara otomatis atau manual</li>
                            <img class="w-full lg:w-3/4" src="https://github.com/mariio46/asset-static-sci/blob/master/tutorial/laptop/3.png?raw=true" alt="tutorial 3 laptop">
                            <li> jika anda memilih otomatis, maka biodata akan tersimpan di komputer anda secara otomatis dengan nama file yang telah dibuat oleh sistem </li>
                            <li> tetapi jika anda memilih manual maka anda harus mengkonfigurasi beberapa hal seperti dibawah ini : </li>
                            <img class="w-full lg:w-3/4" src="https://github.com/mariio46/asset-static-sci/blob/master/tutorial/laptop/4.png?raw=true" alt="tutorial 4 laptop">
                        </ol>
                    </x-accordion-body>
                    <x-accordion-head heading="android-heading" body="android-body" show="false">
                        Tutorial di android
                    </x-accordion-head>
                    <x-accordion-body heading="android-heading" body="android-body">
                        <ol class="ml-5 list-disc space-y-2 text-sm text-gray-600 dark:text-gray-400 lg:text-base">
                            <li>Pada menu biodata tekan icon titik 3 di kanan atas</li>
                            <img class="w-full lg:w-2/6" src="https://raw.githubusercontent.com/mariio46/asset-static-sci/master/tutorial/android/1.jpg" alt="tutorial 1 android">
                            <li>Pilih preview</li>
                            <img class="w-full lg:w-2/6" src="https://raw.githubusercontent.com/mariio46/asset-static-sci/master/tutorial/android/2.jpg" alt="tutorial 2 android">
                            <li>Anda akan diberi 2 opsi, pilih download secara otomatis atau manual</li>
                            <img class="w-full lg:w-2/6" src="https://raw.githubusercontent.com/mariio46/asset-static-sci/master/tutorial/android/3.jpg" alt="tutorial 3 android">
                            <li> jika anda memilih otomatis, maka biodata akan tersimpan di komputer anda secara otomatis dengan nama file yang telah dibuat oleh sistem </li>
                            <li> tetapi jika anda memilih manual maka anda harus mengkonfigurasi beberapa hal seperti dibawah ini : </li>
                            <img class="w-full lg:w-2/6" src="https://raw.githubusercontent.com/mariio46/asset-static-sci/master/tutorial/android/4.jpg" alt="tutorial 4 android">
                        </ol>
                    </x-accordion-body>
                    <x-accordion-head heading="iphone-heading" body="iphone-body" show="false">
                        Tutorial di iphone
                    </x-accordion-head>
                    <x-accordion-body heading="iphone-heading" body="iphone-body">
                        <ol class="ml-5 list-disc space-y-2 text-sm text-gray-600 dark:text-gray-400 lg:text-base">
                            <li>Pada menu biodata tekan icon titik 3 di kanan atas</li>
                            <img class="w-full lg:w-2/6" src="https://raw.githubusercontent.com/mariio46/asset-static-sci/master/tutorial/iphone/1.png" alt="tutorial 1 iphone">
                            <li>Pilih preview</li>
                            <img class="w-full lg:w-2/6" src="https://raw.githubusercontent.com/mariio46/asset-static-sci/master/tutorial/iphone/2.png" alt="tutorial 2 iphone">
                            <li>Anda akan diberi 2 opsi, pilih download secara otomatis atau manual</li>
                            <img class="w-full lg:w-2/6" src="https://raw.githubusercontent.com/mariio46/asset-static-sci/master/tutorial/iphone/3.png" alt="tutorial 3 iphone">
                            <li> jika anda memilih otomatis, maka biodata akan tersimpan di komputer anda secara otomatis dengan nama file yang telah dibuat oleh sistem </li>
                            <li> tetapi jika anda memilih manual maka anda harus mengkonfigurasi beberapa hal seperti dibawah ini : </li>
                            <img class="w-full lg:w-2/6" src="https://raw.githubusercontent.com/mariio46/asset-static-sci/master/tutorial/iphone/4.png" alt="tutorial 4 iphone">
                        </ol>
                    </x-accordion-body>
                </x-accordion>
            </div>
        </div>
    </x-work-space>
</x-auth-layout>
