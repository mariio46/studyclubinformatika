<?php

namespace App\Http\Controllers;

class TutorialController extends Controller
{
    public function __invoke()
    {
        return view('tutorials.index');
    }
}
