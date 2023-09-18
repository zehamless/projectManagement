<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Database\Seeders\ProjectsSeeder;
use Database\Seeders\userSeed;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OperationalTest extends TestCase
{
    use RefreshDatabase;


    /**
     * A basic feature test example.
     */
    public function test_store(): void
    {
        $this->seed([ProjectsSeeder::class, userSeed::class]);
        $project = Project::first();
//        dd($project->id);
        $user = User::all()->first();
        $response = $this->post('/operational/store', [
            'project_id' => $project->id,
            'date' => '2021-10-10',
            'spk_code' => 'SPK001',
            'spk_number' => 'SPK001',
            'type' => 'SPK',
            'team'=> [$user->id],
            'description' => 'SPK',
            'transportation_mode' => 'SPK',
            'vehicle_number' => 'SPK',
            'created_by' => 'SPK',
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseCount('operational_team', 1);
    }
}
