<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        // Status Pendaftaran (Buka / Tutup)
        $this->call([
            // Admin & Pengurus
            RegistrationSeeder::class,
            UserSeeder::class,

            // Pendaftar
            // BiodataSeeder::class,
            // TimelineSeeder::class,

            // Schedules
            ScheduleSeeder::class,
        ]);
    }
}
