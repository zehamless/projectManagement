<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerContact;
use App\Models\Project;
use App\Models\User;
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
        $this->call(CustomerContactSeeder::class);
        $customer_contact = CustomerContact::first();
        $project_manager = User::whereHas('hasroles', function ($q) {
            $q->where('name', 'Project Manager');
        })->get()->first();
        $sales_executive = User::whereHas('hasroles', function ($q) {
            $q->where('name', 'Sales Executive');
        })->get()->first();

        Project::create([
            'po' => 'Project 1',
            'customer_id' => $customer->id,
            'customer_contact_id' => $customer_contact->id,
            'memo' => 'Memo 1',
            'label' => 'Label 1',
            'so' => 'SO 1',
            'location' => 'Location 1',
            'project_manager' => $project_manager->id,
            'sales_executive' => $sales_executive->id,
            'start_date' => '2021-01-01',
            'end_date' => '2021-01-01',
            'preliminary_cost' => '1000000',
            'po_amount' => '1000000',
            'expense_budget' => '1000000',
        ]);
    }
}
