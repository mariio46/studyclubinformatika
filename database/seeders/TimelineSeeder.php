<?php

namespace Database\Seeders;

use App\Models\Timeline;
use App\Models\User;
use Illuminate\Database\Seeder;

class TimelineSeeder extends Seeder
{
    public function run(): void
    {
        $num = User::whereHas('roles')->count() + 1;
        for ($i = 1; $i <= 51; $i++) {
            Timeline::create([
                'user_id' => $num,
                'account_registration' => 1,
                'account_registration_time' => now(),
                'create_biodata' => 1,
                'create_biodata_time' => now(),
                'update_biodata' => 1,
                'update_biodata_time' => now(),
                'download_biodata' => 1,
                'download_biodata_time' => now(),
            ]);
            $num++;
        }
    }
}
