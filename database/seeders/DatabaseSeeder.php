<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\RegistrationStatus;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        // Status Pendaftaran (Buka / Tutup)
        RegistrationStatus::create([
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Admin & Pengurus
        $this->call([
            UserSeeder::class,
        ]);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'operator']);

        User::first()->assignRole('admin');
        User::find(2)->assignRole('operator');
        User::find(3)->assignRole('operator');
        User::find(4)->assignRole('operator');
        User::find(5)->assignRole('operator');
        User::find(6)->assignRole('operator');

        // Pendaftar
        $this->call([
            BiodataSeeder::class,
            RegistrantActivitySeeder::class,
        ]);
    }
}
