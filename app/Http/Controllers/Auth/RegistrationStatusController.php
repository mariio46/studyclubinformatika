<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RegistrationStatus;

class RegistrationStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:operator|admin']);
    }

    public function open()
    {
        RegistrationStatus::openRegistration();

        return back()->with('status-success', 'Registration is open');
    }

    public function close()
    {
        RegistrationStatus::closeRegistration();

        return back()->with('status-failed', 'Registration is close');
    }
}
