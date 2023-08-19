<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Mario',
            'picture' => 'image/default/helper(4).jpg',
            'has_verified' => 1,
            'username' => 'mario46_',
            'email' => 'mariomad2296@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);

        // Pengurus
        User::create([
            'name' => $name = 'Prawira Resky',
            'picture' => 'image/default/helper(3).jpg',
            'whatsapp' => '082249501963',
            'has_verified' => 1,
            'username' => strtolower(Str::of($name)->explode(' ')->get(0)).mt_rand(0, 99999),
            'email' => 'wira@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);

        // Pengurus
        User::create([
            'name' => $name = 'Anisa Cahyani',
            'picture' => 'image/default/helper(2).jpg',
            'whatsapp' => '089604472897',
            'has_verified' => 1,
            'username' => strtolower(Str::of($name)->explode(' ')->get(0)).mt_rand(0, 99999),
            'email' => 'nisa@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);

        // Pengurus
        User::create([
            'name' => $name = 'Sania',
            'picture' => 'image/default/helper(1).jpg',
            'whatsapp' => '0895420758681',
            'has_verified' => 1,
            'username' => strtolower(Str::of($name)->explode(' ')->get(0)).mt_rand(0, 99999),
            'email' => 'sania@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);

        // Pengurus
        User::create([
            'name' => $name = 'Jabal Nur',
            'picture' => 'image/default/helper(5).jpg',
            'whatsapp' => '085256949235',
            'has_verified' => 1,
            'username' => strtolower(Str::of($name)->explode(' ')->get(0)).mt_rand(0, 99999),
            'email' => 'jabal@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);

        // Pengurus
        User::create([
            'name' => $name = 'Ahmad Alif',
            'picture' => 'image/default/helper(4).jpg',
            'whatsapp' => '082154838046',
            'has_verified' => 1,
            'username' => strtolower(Str::of($name)->explode(' ')->get(0)).mt_rand(0, 99999),
            'email' => 'alif@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
