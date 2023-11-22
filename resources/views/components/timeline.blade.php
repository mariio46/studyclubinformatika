@props(['user'])

@php
    use Carbon\Carbon;
    Carbon::setlocale('id');
@endphp
<x-accordion name="timeline">
    <x-accordion-head
        class="flex w-full items-center justify-between text-left font-medium text-gray-500 hover:bg-white focus:ring-4 focus:ring-white dark:border-gray-700 dark:text-gray-400 dark:hover:bg-transparent dark:focus:ring-0"
        heading="timline-heading" body="timline-body" show="true">
        <x-header title="Timeline Pendaftaran Anda" description="2">
            <x-slot:header>
                @isset($user->registration_completed)
                    <span class="text-gray-900 dark:text-gray-400">
                        Informasi tentang proses pendaftaran anda <span class="font-bold text-green-500">(complete)</span>
                    </span>
                @else
                    <span class="text-gray-900 dark:text-gray-400">
                        Informasi tentang proses pendaftaran anda <span class="font-bold text-red-600">(incomplete)</span>
                    </span>
                @endisset
            </x-slot:header>
        </x-header>
    </x-accordion-head>
    <x-accordion-body class="mt-5" heading="timline-heading" body="timline-body">
        <ol class="relative border-l border-gray-200 dark:border-gray-700">
            <x-timeline-list active>
                <x-slot:time>
                    {{ 'Selesai ' . \Carbon\Carbon::parse($user->account_registration_time)->diffForHumans() }}
                </x-slot:time>
                <x-slot:title>
                    Membuat akun
                </x-slot:title>
                <x-slot:body>
                    Anda telah menyelesaikan tahap <strong>Membuat Akun</strong>, langkah selanjutnya adalah membuat biodata.
                </x-slot:body>
            </x-timeline-list>
            @isset($user->create_biodata)
                <x-timeline-list active>
                    <x-slot:time>
                        {{ 'Selesai ' . \Carbon\Carbon::parse($user->create_biodata_time)->diffForHumans() }}
                    </x-slot:time>
                    <x-slot:title>
                        Membuat Biodata
                    </x-slot:title>
                    <x-slot:body>
                        {{-- you have successfully created your biodata, the next step is to update your biodata. --}}
                        Anda telah menyelesaikan tahap <strong>Membuat Biodata</strong>, langkah selanjutnya adalah perbarui biodata.
                    </x-slot:body>
                </x-timeline-list>
            @else
                <x-timeline-list>
                    <x-slot:time>
                        Belum selesai
                    </x-slot:time>
                    <x-slot:title>
                        Membuat Biodata
                    </x-slot:title>
                    <x-slot:body>
                        {{-- To complete this step, you must first create your biodata. --}}
                        Untuk menyelesaikan tahap ini, anda perlu membuat biodata terlebih dahulu.
                    </x-slot:body>
                </x-timeline-list>
            @endisset
            @isset($user->update_biodata)
                <x-timeline-list active>
                    <x-slot:time>
                        {{ 'Selesai ' . \Carbon\Carbon::parse($user->update_biodata_time)->diffForHumans() }}
                    </x-slot:time>
                    <x-slot:title>
                        Perbarui Biodata
                    </x-slot:title>
                    <x-slot:body>
                        Anda telah menyelesaikan tahap <span class="font-bold">Perbarui Biodata</span>, langkah selanjutnya adalah mengunduh biodata, tapi pastikan bahwa anda telah mengisi form dengan
                        lengkap sesuai ketentuan yang telah kami buat.
                    </x-slot:body>
                </x-timeline-list>
            @else
                <x-timeline-list>
                    <x-slot:time>
                        Belum selesai
                    </x-slot:time>
                    <x-slot:title>
                        Perbarui Biodata
                    </x-slot:title>
                    <x-slot:body>
                        {{-- To complete this step, you must update your biodata. --}}
                        Untuk menyelesaikan tahap ini anda perlu untuk memperbarui biodata anda.
                    </x-slot:body>
                </x-timeline-list>
            @endisset
            @isset($user->download_biodata)
                <x-timeline-list active>
                    <x-slot:time>
                        {{ 'Selesai ' . \Carbon\Carbon::parse($user->download_biodata_time)->diffForHumans() }}
                    </x-slot:time>
                    <x-slot:title>
                        Unduh Biodata
                    </x-slot:title>
                    <x-slot:body>
                        Anda telah menyelesaikan tahap <strong>Unduh Biodata</strong>, untuk langkah selanjutnya adalah sesi Wawancara, kami akan menghubungi anda untuk jadwal sesi wawancara.
                    </x-slot:body>
                </x-timeline-list>
            @else
                <x-timeline-list>
                    <x-slot:time>
                        Belum selesai
                    </x-slot:time>
                    <x-slot:title>
                        Unduh Biodata
                    </x-slot:title>
                    <x-slot:body>
                        {{-- To complete this step, you must download your biodata. --}}
                        Untuk menyelesaikan tahap ini anda perlu untuk mengunduh biodata anda.
                    </x-slot:body>
                </x-timeline-list>
            @endisset
            @isset($user->interview_session)
                <x-timeline-list active>
                    <x-slot:time>
                        {{ 'Selesai ' . \Carbon\Carbon::parse($user->interview_session_time)->diffForHumans() }}
                    </x-slot:time>
                    <x-slot:title>
                        Wawancara
                    </x-slot:title>
                    <x-slot:body>
                        {{-- you have successfully complete the interview stage, thanks for your cooperation. --}}
                        Anda telah menyelesaikan tahap <strong>Wawancara</strong>, Terima kasih atas kerja samanya.
                    </x-slot:body>
                </x-timeline-list>
            @else
                <x-timeline-list>
                    <x-slot:time>
                        Belum selesai
                    </x-slot:time>
                    <x-slot:title>
                        Wawancara
                    </x-slot:title>
                    <x-slot:body>
                        {{-- The biodata that you have downloaded will be a requirement to participate in the
                        interview stage. We will contact you for a interview date. --}}
                        Biodata yang telah anda unduh akan menjadi syarat utama untuk mengikuti sesi Wawancara.
                    </x-slot:body>
                </x-timeline-list>
            @endisset
            @isset($user->registration_completed)
                <x-timeline-list active>
                    <x-slot:time>
                        {{ 'Selesai ' . \Carbon\Carbon::parse($user->registration_completed_time)->diffForHumans() }}
                    </x-slot:time>
                    <x-slot:title>
                        Pendaftaran Selesai
                    </x-slot:title>
                    <x-slot:body>
                        {{-- you have successfully completed all registration steps, congratulation you are now verified
                        registrant. thanks for your cooperation! --}}
                        Anda telah menyelesaikan semua tahap, Selamat {{ auth()->user()->getNickName() }} kini anda telah menjadi pendaftar yang terverifikasi. Terima kasih atas kerja sama anda.
                    </x-slot:body>
                </x-timeline-list>
            @else
                <x-timeline-list>
                    <x-slot:time>
                        Belum selesai
                    </x-slot:time>
                    <x-slot:title>
                        Pendaftaran Selesai
                    </x-slot:title>
                    <x-slot:body>
                        {{-- You will be verified after you complete the interview stage. --}}
                        Anda akan diverifikasi jika anda telah mengikuti sesi wawancara
                    </x-slot:body>
                </x-timeline-list>
            @endisset
        </ol>
    </x-accordion-body>
</x-accordion>
