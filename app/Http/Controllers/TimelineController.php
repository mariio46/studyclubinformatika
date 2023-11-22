<?php

namespace App\Http\Controllers;

class TimelineController extends Controller
{
    public function __invoke()
    {
        return view('timeline.index');
    }
}
