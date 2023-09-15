<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Admin'
        ]);
        Role::create([
            'name' => 'SPV'
        ]);
        Role::create([
            'name' => 'Manager'
        ]);
        Role::create([
            'name' => 'Project Manager'
        ]);
        Role::create([
            'name' => 'Sales Executive'
        ]);
        Role::create([
            'name' => 'Technician'
        ]);
        Role::create([
            'name' => 'G.M'
        ]);
    }
}
