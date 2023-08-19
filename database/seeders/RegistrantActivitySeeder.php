<?php

namespace Database\Seeders;

use App\Models\RegistrantActivity;
use Illuminate\Database\Seeder;

class RegistrantActivitySeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 7; $i <= 16; $i++) {
            RegistrantActivity::create([
                'user_id' => $i,
                'account_registration' => 1,
                'account_registration_time' => now(),
                'create_biodata' => 1,
                'create_biodata_time' => now(),
            ]);
        }
    }
}
