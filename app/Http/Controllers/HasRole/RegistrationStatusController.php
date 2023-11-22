<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\RedirectResponse;

class RegistrationStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:operator|admin']);
    }

    public function open(): RedirectResponse
    {
        Registration::where('id', 1)->update(['status' => 1]);

        return back()->with('status-success', 'Registration is open');
    }

    public function close(): RedirectResponse
    {
        Registration::where('id', 1)->update(['status' => 0]);

        return back()->with('status-failed', 'Registration is close');
    }
}
