<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            Threat_levelSeeder::class,
            Types_reportsSeeder::class,
            UsersSeeder::class,
            ForumsSeeder::class,
            CommentsSeeder::class,
            Status_reportsSeeder::class,
            User_pictureSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
