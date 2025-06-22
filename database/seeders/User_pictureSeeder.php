<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User_picture;

class User_pictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    for ($i = 1; $i <= 12; $i++) {
        User_picture::create([
            'picture_url' => "profile_$i.png",
        ]);
    }

}

}
