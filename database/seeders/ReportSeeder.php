<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reports;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reports::create([
            'website_name' => 'https://github.com',
            'id_user' => 1,
            'id_type' => 1,
            'id_status' => 1,
            'id_threat_level' => 1,
            'description' => 'Ce site me semble suspicieux, à verifier de toute urgence!!'
        ]);
        Reports::create([
            'website_name' => 'https://www.linkedin.com',
            'id_user' => 2,
            'id_type' => 3,
            'id_status' => 1,
            'id_threat_level' => 1,
            'description' => 'Je n\'ai toujours pas trouvé d\'alternance...'
        ]);
        Reports::create([
            'website_name' => 'https://boardgamearena.com/',
            'id_user' => 3,
            'id_type' => 2,
            'id_status' => 1,
            'id_threat_level' => 1,
            'description' => 'Site web bonne ambiance, sans risque'
        ]);
        Reports::create([
            'website_name' => 'https://brawlify.com',
            'id_user' => 1,
            'id_type' => 3,
            'id_status' => 1,
            'id_threat_level' => 1,
            'description' => 'Ce site me dit que j\'ai 0 trophée, une vraie arnaque !'
        ]);
        Reports::create([
            'website_name' => 'https://laravel.com',
            'id_user' => 2,
            'id_type' => 1,
            'id_status' => 1,
            'id_threat_level' => 1,
            'description' => 'Meilleur site de renseignement ♥'
        ]);
    }
}
