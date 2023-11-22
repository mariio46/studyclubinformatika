<?php

namespace Database\Seeders;

use App\Models\Registration;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        // Status Pendaftaran (Buka / Tutup)
        Registration::create(['status' => 0]);
    }
}
