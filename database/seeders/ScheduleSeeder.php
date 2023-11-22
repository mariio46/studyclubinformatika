<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'name' => $name = 'Pengakderan SCI 2024',
                'location' => 'Lowita, Suppa, Pinrang',
                'identifier' => Str::slug(strtolower($name . '-' . mt_rand(11111, 99999))),
                'time' => '16:00',
                'date_start' => '2024-01-21',
                'date_end' => '2024-01-24',
                'active_in' => 'active',
            ],
            [
                'name' => $name = 'Family Gathering 2024',
                'location' => 'Lowita, Suppa, Pinrang',
                'identifier' => Str::slug(strtolower($name . '-' . mt_rand(11111, 99999))),
                'time' => '08:00',
                'date_start' => '2024-03-21',
                'date_end' => '2024-03-24',
            ],
        ])->each(fn ($value) => Schedule::create($value));
    }
}
