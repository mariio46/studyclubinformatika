<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\RegistrationStatus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        // Status Pendaftaran (Buka / Tutup)
        RegistrationStatus::create([
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Admin & Pengurus
        $this->call([
            UserSeeder::class,
        ]);

        // Pendaftar
        $this->call([
            // BiodataSeeder::class,
            // RegistrantActivitySeeder::class,
            ScheduleSeeder::class,
        ]);
    }
}
