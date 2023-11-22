<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class PromoteController extends Controller
{
    public function __invoke(User $user): RedirectResponse
    {
        $user->biodata()->count() ? $user->biodata->delete() : true;

        $user->timeline()->count() ? $user->timeline->delete() : true;

        $user->assignRole('operator');

        return back();
    }
}
