<?php

namespace Database\Seeders;

use App\Models\Operational;
use App\Models\OperationalAgenda;
use Illuminate\Database\Seeder;

class OperationalAgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $operational = Operational::first();
        OperationalAgenda::create([
            'operational_id' => $operational->id,
            'description' => 'description',
            'due_date' => '2021-01-01',
            'status' => 'done',
        ]);
        OperationalAgenda::create([
            'operational_id' => $operational->id,
            'description' => 'description2',
            'due_date' => '2021-01-22',
            'status' => 'done',
        ]);
    }
}
