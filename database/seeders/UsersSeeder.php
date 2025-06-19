<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'id_role' => 1,
            'pseudo' => 'AdminMaster',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'), // 🔐
        ]);

        User::create([
            'id_role' => 2,
            'pseudo' => 'ModoPierre',
            'email' => 'modo@example.com',
            'password' => Hash::make('modo123'),
        ]);

        User::create([
            'id_role' => 3,
            'pseudo' => 'SimpleUser',
            'email' => 'user@example.com',
            'password' => Hash::make('user123'),
        ]);
    }
}
