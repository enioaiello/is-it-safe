<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Status_report;

class Status_reportsSeeder extends Seeder
{
    public function run(): void
{
    Status_report::create([
        'id' => 1,
        'name_status' => 'En attente',
    ]);

    Status_report::create([
        'id' => 2,
        'name_status' => 'Accepté',
    ]);

    Status_report::create([
        'id' => 3,
        'name_status' => 'Refusé',
    ]);
}
}
