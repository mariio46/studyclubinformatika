<aside class="fixed left-0 z-40 h-screen w-64 -translate-x-full transition-transform lg:top-20 lg:translate-x-0" id="separator-sidebar" aria-label="Sidebar">
    <div class="h-full overflow-y-auto bg-white px-3 py-4 dark:bg-black">
        @auth
            <ul class="mb-4 space-y-0.5 font-medium">
                <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" svg="dashboard">
                    Dashboard
                </x-sidebar-link>
                <x-sidebar-link :href="route('biodata.index')" :active="request()->routeIs('biodata.*')" svg="biodata">
                    @hasanyrole(['operator', 'admin'])
                        Profile
                    @else
                        Biodata
                    @endhasanyrole
                </x-sidebar-link>
                <x-sidebar-link :href="route('timeline')" :active="request()->routeIs('timeline')" svg="timeline">
                    timeline
                </x-sidebar-link>
                <x-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.*')" svg="security">
                    security
                </x-sidebar-link>
                <x-sidebar-link :href="route('tutorial')" :active="request()->routeIs('tutorial')" svg="tutorial">
                    tutorial
                </x-sidebar-link>
                <x-sidebar-link :href="route('help')" :active="request()->routeIs('help')" svg="help">
                    help
                </x-sidebar-link>
            </ul>
        @endauth
        @hasanyrole(['operator', 'admin'])
            <ul class="mb-4 space-y-0.5 border-y border-y-gray-300 py-4 font-medium dark:border-y-gray-700">
                <x-sidebar-link :href="route('registrant.index')" :active="request()->routeIs('registrant.*')" svg="registrant-list">
                    registrant list
                    <x-slot:mark>
                        <x-verified-icon type="operator" />
                    </x-slot:mark>
                </x-sidebar-link>
                <x-sidebar-link :href="route('schedule.index')" :active="request()->routeIs('schedule.*')" svg="schedule">
                    Schedules
                    <x-slot:mark>
                        <x-verified-icon type="operator" />
                    </x-slot:mark>
                </x-sidebar-link>
            </ul>
        @endhasanyrole
        @hasrole('admin')
            <ul class="space-y-0.5 font-medium">
                <x-sidebar-link :href="route('operator.index')" :active="request()->routeIs('operator.*')" svg="operator-list">
                    operator list
                    <x-slot:mark>
                        <x-verified-icon type="admin" />
                    </x-slot:mark>
                </x-sidebar-link>
            </ul>
        @endhasrole
    </div>
</aside>
