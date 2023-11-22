<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class TimelineController extends Controller
{
    public function __invoke(): View
    {
        return view('timeline.index');
    }
}
