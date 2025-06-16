<?php

namespace Database\Seeders;

use App\Models\Types_report;
use Illuminate\Database\Seeder;

class Types_reportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name_type' => 'email'],
            ['name_type' => 'phone'],
            ['name_type' => 'website'],
        ];

        foreach ($types as $type) {
            Types_report::create($type);
        }
    }
}
