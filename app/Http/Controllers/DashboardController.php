<?php

namespace App\Http\Controllers;

use App\Models\RegistrationStatus;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $data = RegistrationStatus::query()->where('id', 1)->select('status')->first()->status;

        return view('dashboard.index', [
            'open' => $data == 1 ? true : false,
            'user' => auth()->user()->registrantActivity,
        ]);
    }
}
