<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RegistrantActivity;
use App\Models\User;

class VerifiedRegistrantController extends Controller
{
    public function verify(User $user)
    {
        if ($user->biodata) {
            if (! $user->registrantActivity->interview_session) {
                RegistrantActivity::verifyTimeline($user->id);
            }

            User::where('id', $user->id)->update(['has_verified' => 1]);

            return back()->with('status-success', "$user->name has been verified");
        } else {
            return back()->with('status-failed', 'Failed, '.$user->getNickname().' does not have biodata');
        }
    }

    public function unverify(User $user)
    {
        if ($user->registrantActivity->interview_session) {
            RegistrantActivity::unverifyTimeline($user->id);
        }

        User::where('id', $user->id)->update(['has_verified' => 0]);

        return back()->with('status-failed', "$user->name has been unverified");
    }
}
