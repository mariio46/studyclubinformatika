<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:operator|admin']);
    }

    public function index()
    {
        return view('operator.schedule.index', [
            'collections' => Schedule::select('id', 'name', 'location', 'identifier', 'time', 'date_start', 'date_end', 'active_in')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $schedule = $request->validateWithBag('scheduleDelition', [
            'name'          => ['required', 'string', 'min:5', 'max:255'],
            'location'      => ['required', 'string', 'min:5', 'max:255'],
            'time'          => ['required', 'date_format:H:i'],
            'date_start'    => ['required', 'date'],
            'date_end'      => ['required', 'date', 'after:date_start'],
        ]);

        Schedule::create($schedule);
        return back()->with('status', 'Schedule has been added!');
    }

    public function show(Schedule $schedule)
    {
        return $schedule->name;
    }

    public function activate(Schedule $schedule)
    {
        Schedule::where('id', $schedule->id)->update(['active_in' => 'biodata']);
        return back();
    }

    public function deactivate(Schedule $schedule)
    {
        Schedule::where('id', $schedule->id)->update(['active_in' => null]);
        return back();
    }

    public function delete(Schedule $schedule)
    {
        $schedule->delete();
        return back();
    }
}
