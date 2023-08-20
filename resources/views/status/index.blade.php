<x-auth-layout title="Activity Progress">
    <x-work-space>
        @hasanyrole(['operator', 'admin'])
            <div id="operator-accordion" data-accordion="collapse"
                data-active-classes="dark:bg-transparent text-gray-900 dark:text-white">
                <h2 id="operator-accordion-heading-1">
                    <button type="button"
                        class="flex items-center justify-between w-full font-medium text-left text-gray-500  focus:ring-0 focus:ring-white dark:focus:ring-0 dark:border-gray-700 dark:text-gray-400 hover:bg-white dark:hover:bg-transparent"
                        data-accordion-target="#operator-accordion-body-1" aria-expanded="true"
                        aria-controls="operator-accordion-body-1">
                        <span>
                            <x-dashboard.header title="Registrant Information">
                                <x-slot:header>
                                    this is all registrant information.
                                </x-slot:header>
                            </x-dashboard.header>
                        </span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="operator-accordion-body-1" class="hidden mt-5" aria-labelledby="operator-accordion-heading-1">
                    <div>
                        <ol class="relative border-l border-gray-200 dark:border-gray-700">
                            <li class="mb-10 ml-4">
                                <div
                                    class="absolute w-3 h-3 bg-green-400 rounded-full mt-1.5 -left-1.5 border border-white dark:border-green-900 dark:bg-green-400">
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    Registrant total : {{ App\Models\User::doesntHave('roles')->count() }}
                                </h3>
                                <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    This is the total number of users who have registered.
                                </p>
                            </li>
                            <li class="mb-10 ml-4">
                                <div
                                    class="absolute w-3 h-3 bg-green-400 rounded-full mt-1.5 -left-1.5 border border-white dark:border-green-900 dark:bg-green-400">
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    Registrant does fill biodata :
                                    {{ App\Models\User::doesntHave('roles')->has('biodata')->count() }}
                                </h3>
                                <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    This is the total registrant who have biodata.
                                </p>
                            </li>
                            <li class="mb-10 ml-4">
                                <div
                                    class="absolute w-3 h-3 bg-green-400 rounded-full mt-1.5 -left-1.5 border border-white dark:border-green-900 dark:bg-green-400">
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    Registrant doesn't fill biodata :
                                    {{ App\Models\User::doesntHave('roles')->doesntHave('biodata')->count() }}
                                </h3>
                                <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    This is the total registrant who doesn't have biodata.
                                </p>
                            </li>
                            <li class="mb-10 ml-4">
                                <div
                                    class="absolute w-3 h-3 bg-green-400 rounded-full mt-1.5 -left-1.5 border border-white dark:border-green-900 dark:bg-green-400">
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    Verified registrant :
                                    {{ App\Models\User::doesntHave('roles')->where('has_verified', 1)->count() }}
                                </h3>
                                <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    This is the total registrant, who have been verified by operator.
                                </p>
                            </li>
                            <li class="mb-10 ml-4">
                                <div
                                    class="absolute w-3 h-3 bg-green-400 rounded-full mt-1.5 -left-1.5 border border-white dark:border-green-900 dark:bg-green-400">
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    Unverified registrant :
                                    {{ App\Models\User::doesntHave('roles')->where('has_verified', 0)->count() }}
                                </h3>
                                <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    This is the total registrant, who have not been verified.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        @else
            @php
                $user = auth()->user()->registrantActivity;
            @endphp
            <div id="registrant-accordion" data-accordion="collapse" data-active-classes="text-gray-900 dark:text-white">
                <h2 id="registrant-accordion-heading-1">
                    <button type="button"
                        class="flex items-center justify-between w-full font-medium text-left text-gray-500 focus:ring-4 focus:ring-white dark:focus:ring-0 dark:border-gray-700 dark:text-gray-400 hover:bg-white dark:hover:bg-transparent"
                        data-accordion-target="#registrant-accordion-body-1" aria-expanded="true"
                        aria-controls="registrant-accordion-body-1">
                        <span>
                            <x-dashboard.header title="Registration Progress">
                                <x-slot:header>
                                    @isset($user->registration_completed)
                                        <span class="text-gray-900 dark:text-gray-400">
                                            this is your registration information status <span
                                                class="text-green-500 font-bold">(complete)</span>
                                        </span>
                                    @else
                                        <span class="text-gray-900 dark:text-gray-400">
                                            this is your registration information status <span
                                                class="text-red-600 font-bold">(incomplete)</span>
                                        </span>
                                    @endisset
                                </x-slot:header>
                            </x-dashboard.header>
                        </span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="registrant-accordion-body-1" class="hidden mt-5" aria-labelledby="registrant-accordion-heading-1">
                    <div>
                        <ol class="relative border-l border-gray-200 dark:border-gray-700">

                            <li class="mb-10 ml-4">
                                <div
                                    class="absolute w-3 h-3 bg-green-400 rounded-full mt-1.5 -left-1.5 border border-white dark:border-green-900 dark:bg-green-400">
                                </div>
                                <time class="mb-1 text-xs font-normal leading-none text-gray-400 dark:text-gray-400">
                                    {{ 'completed ' . \Carbon\Carbon::parse($user->account_registration_time)->diffForHumans() }}
                                </time>
                                <h3 class="text-lg font-semibold text-green-400 ">
                                    Account Registration
                                </h3>
                                <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    you have successfully created an account, the next step is to create your biodata.
                                </p>
                            </li>
                            @isset($user->create_biodata)
                                <li class="mb-10 ml-4">
                                    <div
                                        class="absolute w-3 h-3 bg-green-400 rounded-full mt-1.5 -left-1.5 border border-white dark:border-green-900 dark:bg-green-400">
                                    </div>
                                    <time class="mb-1 text-xs font-normal leading-none text-gray-400 dark:text-gray-400">
                                        {{ 'completed ' . \Carbon\Carbon::parse($user->create_biodata_time)->diffForHumans() }}
                                    </time>
                                    <h3 class="text-lg font-semibold text-green-400 ">
                                        Create Biodata
                                    </h3>
                                    <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                        you have successfully created your biodata, the next step is to update your biodata.
                                    </p>
                                </li>
                            @else
                                <li class="mb-10 ml-4">
                                    <div
                                        class="absolute w-3 h-3 bg-gray-400 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                    </div>
                                    <time class="mb-1 text-xs font-normal leading-none text-gray-400 dark:text-gray-500">
                                        uncompleted
                                    </time>
                                    <h3 class="text-lg font-semibold text-gray-400 dark:text-white">
                                        Create Biodata
                                    </h3>
                                    <p class="mb-4 text-sm font-normal text-gray-400 dark:text-gray-400">
                                        To complete this step, you must first create your biodata.
                                    </p>
                                </li>
                            @endisset

                            @isset($user->update_biodata)
                                <li class="mb-10 ml-4">
                                    <div
                                        class="absolute w-3 h-3 bg-green-400 rounded-full mt-1.5 -left-1.5 border border-white dark:border-green-900 dark:bg-green-400">
                                    </div>
                                    <time class="mb-1 text-xs font-normal leading-none text-gray-400 dark:text-gray-400">
                                        {{ 'completed ' . \Carbon\Carbon::parse($user->update_biodata_time)->diffForHumans() }}
                                    </time>
                                    <h3 class="text-lg font-semibold text-green-400 ">
                                        Update Biodata
                                    </h3>
                                    <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                        you have successfully update your biodata, the next step is to download your biodata but
                                        make
                                        sure you <span class="font-bold">fill all columns</span>.
                                    </p>
                                </li>
                            @else
                                <li class="mb-10 ml-4">
                                    <div
                                        class="absolute w-3 h-3 bg-gray-400 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                    </div>
                                    <time class="mb-1 text-xs font-normal leading-none text-gray-400 dark:text-gray-500">
                                        uncompleted
                                    </time>
                                    <h3 class="text-lg font-semibold text-gray-400 dark:text-white">
                                        Update Biodata
                                    </h3>
                                    <p class="mb-4 text-sm font-normal text-gray-400 dark:text-gray-400">
                                        To complete this step, you must update your biodata.
                                    </p>
                                </li>
                            @endisset

                            @isset($user->download_biodata)
                                <li class="mb-10 ml-4">
                                    <div
                                        class="absolute w-3 h-3 bg-green-400 rounded-full mt-1.5 -left-1.5 border border-white dark:border-green-900 dark:bg-green-400">
                                    </div>
                                    <time class="mb-1 text-xs font-normal leading-none text-gray-400 dark:text-gray-400">
                                        {{ 'completed ' . \Carbon\Carbon::parse($user->download_biodata_time)->diffForHumans() }}
                                    </time>
                                    <h3 class="text-lg font-semibold text-green-400 ">
                                        Download Biodata
                                    </h3>
                                    <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                        you have successfully download your biodata, we will contact you for the next step!
                                    </p>
                                </li>
                            @else
                                <li class="mb-10 ml-4">
                                    <div
                                        class="absolute w-3 h-3 bg-gray-400 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                    </div>
                                    <time class="mb-1 text-xs font-normal leading-none text-gray-400 dark:text-gray-500">
                                        uncompleted
                                    </time>
                                    <h3 class="text-lg font-semibold text-gray-400 dark:text-white">
                                        Download Biodata
                                    </h3>
                                    <p class="mb-4 text-sm font-normal text-gray-400 dark:text-gray-400">
                                        To complete this step, you must download your biodata.
                                    </p>
                                </li>
                            @endisset

                            @isset($user->interview_session)
                                <li class="mb-10 ml-4">
                                    <div
                                        class="absolute w-3 h-3 bg-green-400 rounded-full mt-1.5 -left-1.5 border border-white dark:border-green-900 dark:bg-green-400">
                                    </div>
                                    <time class="mb-1 text-xs font-normal leading-none text-gray-400 dark:text-gray-400">
                                        {{ 'completed ' . \Carbon\Carbon::parse($user->interview_session_time)->diffForHumans() }}
                                    </time>
                                    <h3 class="text-lg font-semibold text-green-400 ">
                                        Interview
                                    </h3>
                                    <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                        you have successfully complete the interview stage, thanks for your cooperation.
                                    </p>
                                </li>
                            @else
                                <li class="mb-10 ml-4">
                                    <div
                                        class="absolute w-3 h-3 bg-gray-400 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                    </div>
                                    <time class="mb-1 text-xs font-normal leading-none text-gray-400 dark:text-gray-500">
                                        uncompleted
                                    </time>
                                    <h3 class="text-lg font-semibold text-gray-400 dark:text-white">
                                        Interview
                                    </h3>
                                    <p class="mb-4 text-sm font-normal text-gray-400 dark:text-gray-400">
                                        The biodata that you have downloaded will be a requirement to participate in the
                                        interview stage. We will contact you for a interview date.
                                    </p>
                                </li>
                            @endisset

                            @isset($user->registration_completed)
                                <li class="mb-10 ml-4">
                                    <div
                                        class="absolute w-3 h-3 bg-green-400 rounded-full mt-1.5 -left-1.5 border border-white dark:border-green-900 dark:bg-green-400">
                                    </div>
                                    <time class="mb-1 text-xs font-normal leading-none text-gray-400 dark:text-gray-400">
                                        {{ 'completed ' . \Carbon\Carbon::parse($user->registration_completed_time)->diffForHumans() }}
                                    </time>
                                    <h3 class="text-lg font-semibold text-green-400 ">
                                        Registration Completed
                                    </h3>
                                    <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                        you have successfully completed all registration steps, congratulation you are now
                                        verified
                                        registrant. thanks for your cooperation!
                                    </p>
                                </li>
                            @else
                                <li class="ml-4">
                                    <div
                                        class="absolute w-3 h-3 bg-gray-400 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                    </div>
                                    <time class="mb-1 text-xs font-normal leading-none text-gray-400 dark:text-gray-500">
                                        uncompleted
                                    </time>
                                    <h3 class="text-lg font-semibold text-gray-400 dark:text-white">
                                        Registration Completed.
                                    </h3>
                                    <p class="mb-4 text-sm font-normal text-gray-400 dark:text-gray-400">
                                        You will be verified after you complete the interview stage.
                                    </p>
                                </li>
                            @endisset
                        </ol>
                    </div>
                </div>
            </div>
        @endhasanyrole
    </x-work-space>
</x-auth-layout>
