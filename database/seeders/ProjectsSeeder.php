<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //call customer seed
        $this->call(CustomerSeeder::class);
        $customer = Customer::first();
        Project::create([
            'po' => 'Project 1',
            'customer_id' => $customer->id,
            'memo' => 'Memo 1',
            'label' => 'Label 1',
            'so' => 'SO 1',
            'location' => 'Location 1',
            'project_manager' => 'Project Manager 1',
            'sales_executive' => 'Sales Executive 1',
            'start_date' => '2021-01-01',
            'end_date' => '2021-01-01',
            'preliminary_cost' => '1000000',
            'po_amount' => '1000000',
            'expense_budget' => '1000000',
        ]);
    }
}
