<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class VerifyController extends Controller
{
    public function verify(User $user): RedirectResponse
    {
        if ($user->biodata && $user->timeline->update_biodata == 1 && $user->timeline->download_biodata == 1) {
            if (! $user->timeline->interview_session) {
                $user->timeline()->update([
                    'interview_session' => 1,
                    'interview_session_time' => now(),
                    'registration_completed' => 1,
                    'registration_completed_time' => now(),
                ]);
            }

            $user->update(['has_verified' => 1]);

            return back()->with('status-success', "{$user->name} telah diverifikasi");
        } else {
            return back()->with('status-failed', "{$user->getNickname()} belum memenuhi syarat untuk di verifikasi");
        }
    }

    public function unverify(User $user): RedirectResponse
    {
        if ($user->timeline->interview_session) {
            $user->timeline()->update([
                'interview_session' => null,
                'interview_session_time' => null,
                'registration_completed' => null,
                'registration_completed_time' => null,
            ]);
        }

        $user->update(['has_verified' => 0]);

        return back()->with('status-failed', "verifikasi {$user->name} telah dibatalkan");
    }
}
