<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name_role' => 'admin'],
            ['name_role' => 'moderator'],
            ['name_role' => 'user'],
        ];

        foreach ($roles as $role) {
            Roles::create($role);
        }
    }
}
