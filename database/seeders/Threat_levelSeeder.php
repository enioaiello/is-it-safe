<?php

namespace Database\Seeders;

use App\Models\Threat_level;
use Illuminate\Database\Seeder;

class Threat_levelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            ['name_level' => 'none'],
            ['name_level' => 'low'],
            ['name_level' => 'medium'],
            ['name_level' => 'high'],
            ['name_level' => 'critical'],
        ];

        foreach ($levels as $level) {
            Threat_level::create($level);
        }
    }
}
