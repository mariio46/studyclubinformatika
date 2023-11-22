<?php

namespace App\Http\Controllers;

use App\Models\Registration;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('dashboard.index', [
            'open' => Registration::getRegistrationStatus(),
            'user' => auth()->user()->timeline,
        ]);
    }
}
