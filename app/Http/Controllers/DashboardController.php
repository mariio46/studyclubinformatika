<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard.index', [
            'open' => Registration::getRegistrationStatus(),
            'user' => auth()->user()->timeline,
        ]);
    }
}
