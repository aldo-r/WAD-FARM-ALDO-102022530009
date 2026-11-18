<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Akun Admin
        User::firstOrCreate(
            ['email' => 'admin@farm.com'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('password'),
                'role'     => 'admin',
            ]
        );

        // Akun User Biasa
        User::firstOrCreate(
            ['email' => 'user@farm.com'],
            [
                'name'     => 'User Biasa',
                'password' => Hash::make('password'),
                'role'     => 'user',
            ]
        );
    }
}
