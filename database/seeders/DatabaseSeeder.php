<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // Admin & Pengurus
            RegistrationSeeder::class,
            UserSeeder::class,

            // Pendaftar
            BiodataSeeder::class,
            TimelineSeeder::class,

            // Schedules
            ScheduleSeeder::class,
        ]);
    }
}
