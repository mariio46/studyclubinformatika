<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class TutorialController extends Controller
{
    public function __invoke(): View
    {
        return view('tutorials.index');
    }
}
