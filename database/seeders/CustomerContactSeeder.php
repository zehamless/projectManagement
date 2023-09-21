<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerContact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(CustomerSeeder::class);
        $customer = Customer::first();
        CustomerContact::create([
            'name' => 'Puh Sepuh',
            'phone' => '0853287422',
            'customer_id' => $customer->id,
        ]);
    }
}
