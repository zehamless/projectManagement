<?php

namespace Database\Seeders;

use App\Models\Operational;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperationalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::limit(10)->pluck('id')->toArray();
        $projectId = Project::first()->id;
        $operational = Operational::create([
            'project_id' => $projectId,
            'date' => '2021-01-01',
            'spk_code' => 'SPK Code 1',
            'spk_number' => 'SPK Number 1',
            'type' => 'type01',
            'description' => 'desc',
            'transportation_mode' => 'car',
            'vehicle_number' => 'be1088ce',
            'created_by' => 'admin',
        ]);
        foreach ($users as $user) {
            $operational->team()->attach($user);
        }
    }
}
