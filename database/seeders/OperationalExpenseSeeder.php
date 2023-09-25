<?php

namespace Database\Seeders;

use App\Models\Operational;
use App\Models\OperationalExpense;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperationalExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $operational = Operational::first();
        OperationalExpense::create([
            'operational_id' => $operational->id,
            'date' => '2021-01-01',
            'item' => 'item',
            'amount' => 100,
        ]);
        OperationalExpense::create([
            'operational_id' => $operational->id,
            'date' => '2021-01-22',
            'item' => 'itemBanget',
            'amount' => 10000,
        ]);
    }
}
