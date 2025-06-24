<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'id_user' => 1,
                'title' => 'title 1',
                'message' => 'test message 1',
            ],
            [
                'id_user' => 2,
                'title' => 'title 2',
                'message' => 'test message 2',
            ],
            [
                'id_user' => 1,
                'title' => 'title 3',
                'message' => 'test message 3',
            ],
        ];

        foreach ($messages as $message) {
            Message::create($message);
        }
    }
}
