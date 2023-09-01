<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrantActivity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createTimeline($userId)
    {
        return RegistrantActivity::create([
            'user_id' => $userId,
            'account_registration' => 1,
            'account_registration_time' => now(),
            'create_biodata' => 1,
            'create_biodata_time' => now(),
        ]);
    }

    public static function updateBiodata($userId)
    {
        return RegistrantActivity::where('user_id', $userId)->update([
            'update_biodata' => 1,
            'update_biodata_time' => now(),
        ]);
    }

    public static function updateDownloadBiodata($userId)
    {
        return RegistrantActivity::where('user_id', $userId)->update([
            'download_biodata' => 1,
            'download_biodata_time' => now(),
        ]);
    }

    public static function verifyTimeline($userId)
    {
        return RegistrantActivity::where('user_id', $userId)->update([
            'interview_session' => 1,
            'interview_session_time' => now(),
            'registration_completed' => 1,
            'registration_completed_time' => now(),
        ]);
    }

    public static function unverifyTimeline($userId)
    {
        return RegistrantActivity::where('user_id', $userId)->update([
            'interview_session' => null,
            'interview_session_time' => null,
            'registration_completed' => null,
            'registration_completed_time' => null,
        ]);
    }
}
