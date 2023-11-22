<section class="pt-14 sm:pt-36" id="home">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="w-full self-center py-5 sm:w-1/2">
                <h1 class="max-w-xs text-3xl font-bold leading-10 text-dark dark:text-white sm:max-w-full lg:max-w-[555px] lg:text-5xl xl:max-w-[650px] xl:text-6xl 2xl:text-[69px]">
                    Seatap
                    <span class="text-primary">Belajar</span>
                    & <span class="text-primary">Berkarya</span>
                    Bersama.
                </h1>
                <p class="lg:text-md my-[10px] mb-7 max-w-xs text-xs font-semibold leading-relaxed text-secondary dark:text-gray-400 sm:max-w-full lg:max-w-[350px] xl:max-w-md xl:text-sm xl:leading-6">
                    Mari bergabung bersama kami dan tingkatkan skill anda
                    dibidang
                    <span class="font-bold uppercase text-primary underline underline-offset-2">INFORMATIKA!</span>
                </p>
                @guest
                    <a class="inline-flex items-center rounded-md border border-transparent bg-gradient-to-bl from-black via-emerald-700 to-black px-6 py-3 text-sm font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 active:bg-gray-900 dark:border dark:border-gray-700 dark:bg-gradient-to-bl dark:from-teal-950 dark:via-black dark:to-teal-950"
                        href="{{ route('register') }}">Join
                        Now</a>
                @endguest
            </div>
            <div class="w-full py-5 sm:flex sm:w-1/2 sm:justify-end">
                <div class="">
                    <img class="mx-auto max-w-xs sm:w-full sm:max-w-max md:w-72 lg:w-96 xl:w-[500px]" src="{{ asset('storage/image/default/sci-maskot-lg.png') }}" alt="maskot" />
                </div>
            </div>
        </div>
    </div>
</section>
