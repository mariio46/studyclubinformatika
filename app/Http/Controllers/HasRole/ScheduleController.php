<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;
use App\Models\Schedule;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:operator|admin']);
    }

    public function index(): View
    {
        return view('operator.schedule.index', [
            'collections' => Schedule::select('id', 'name', 'location', 'identifier', 'time', 'date_start', 'date_end', 'active_in')->get(),
            'schedule' => new Schedule,
        ]);
    }

    public function store(ScheduleRequest $request): RedirectResponse
    {
        $schedule = Schedule::create($request->validated());

        return back()->with('status-success', $schedule->name . ' has been added!');
    }

    public function edit(Schedule $schedule): View
    {
        return view('operator.schedule.edit', compact('schedule'));
    }

    public function update(ScheduleRequest $request, Schedule $schedule): RedirectResponse
    {
        $schedule->update($request->validated());

        return to_route('schedule.index')->with('status-success', 'Schedule has been updated!');
    }

    public function activate(Schedule $schedule): RedirectResponse
    {
        Schedule::whereNotNull('active_in')->update(['active_in' => null]);

        $schedule->update(['active_in' => 'active']);

        return back()->with('status-success', "{$schedule->name} is active!");
    }

    public function deactivate(Schedule $schedule): RedirectResponse
    {
        $schedule->update(['active_in' => null]);

        return back()->with('status-success', "{$schedule->name} is deactive!");
    }

    public function delete(Schedule $schedule): RedirectResponse
    {
        $schedule->delete();

        return back()->with('status-success', "{$schedule->name} has been deleted!");
    }
}
