<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Forums;

class ForumsSeeder extends Seeder
{
    public function run(): void
    {
        Forums::create([
            'id_user' => 1,
            'title' => 'Forum sur Laravel',
            'description' => 'Un espace de discussion pour poser des questions sur Laravel.',
        ]);

        Forums::create([
            'id_user' => 2,
            'title' => 'Forum sur le gaming',
            'description' => 'Parlons des meilleurs jeux de 2025 !',
        ]);
    }
}
