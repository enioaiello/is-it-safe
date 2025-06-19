<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comments;

class CommentsSeeder extends Seeder
{
    public function run(): void
    {
        Comments::create([
            'id_user' => 1,
            'id_forum' => 1,
            'comment' => 'Laravel 11 est vraiment puissant !',
        ]);

        Comments::create([
            'id_user' => 2,
            'id_forum' => 1,
            'comment' => 'Je préfère Symfony 😅',
        ]);

        Comments::create([
            'id_user' => 1,
            'id_forum' => 2,
            'comment' => 'Zelda 2025 est une dinguerie 🔥',
        ]);
    }
}
