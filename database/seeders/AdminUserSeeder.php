<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Ganti dengan email admin yang kamu inginkan
            [
                'name' => 'Admin User',
                'password' => Hash::make('password123'), // Ganti dengan password yang aman
                'role' => User::ROLE_ADMIN, // Pastikan sesuai dengan model User
            ]
        );
    }
}