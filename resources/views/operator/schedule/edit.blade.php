@inject('carbon', 'Carbon\Carbon')
<x-auth-layout title="Update Schedule">
    <x-work-space>
        <x-header title="Edit Jadwal" description="1">
            <x-slot:header>
                Edit jadwal {{ $schedule->name }}.
            </x-slot:header>
        </x-header>
        <div class="mt-5 max-w-lg">
            <form action="{{ route('schedule.update', $schedule) }}" method="POST">
                @method('put')
                @include('operator.schedule.partials._form-schedule')
                <div class="mt-6">
                    <x-primary-button>
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </x-work-space>
</x-auth-layout>
