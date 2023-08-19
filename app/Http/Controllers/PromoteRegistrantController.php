<?php

namespace App\Http\Controllers;

use App\Models\User;

class PromoteRegistrantController extends Controller
{
    public function __invoke(User $user)
    {
        if ($user->biodata) {
            $user->biodata->delete();
        }
        $user->assignRole('operator');

        return back();
    }
}
