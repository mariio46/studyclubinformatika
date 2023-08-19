<?php

namespace App\Http\Controllers;

use App\Models\RegistrationStatus;

class RegistrationStatusController extends Controller
{
    public function open()
    {
        RegistrationStatus::where('id', 1)->update([
            'status' => 1,
        ]);

        return back()->with('status-success', 'Registration is open');
    }

    public function close()
    {
        RegistrationStatus::where('id', 1)->update([
            'status' => 0,
        ]);

        return back()->with('status-failed', 'Registration is close');
    }
}
