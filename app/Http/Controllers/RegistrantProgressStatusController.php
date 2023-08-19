<?php

namespace App\Http\Controllers;

class RegistrantProgressStatusController extends Controller
{
    public function __invoke()
    {
        return view('status.index');
    }
}
