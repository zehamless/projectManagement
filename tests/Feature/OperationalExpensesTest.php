<?php

namespace Tests\Feature;

use App\Models\Operational;
use App\Models\OperationalExpense;
use App\Models\Project;
use App\Models\User;
use Database\Seeders\ProjectsSeeder;
use Database\Seeders\userSeed;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OperationalExpensesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_seed_operational(): void
    {
        $this->seed([ProjectsSeeder::class, userSeed::class]);
        $project = Project::first();
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
        $this->session(['success' => null]);
    }
    public function test_post(): void
    {
        $this->test_seed_operational();
        $operational = Operational::first();
        self::assertNotNull($operational);
        $response = $this->post('/operational/expense/store', [
            'operational_id' => $operational->id,
            'date' => '2021-01-01',
            'item' => 'item',
            'amount' => 100,
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('operational_expense', [
            'operational_id' => $operational->id,
            'date' => '2021-01-01',
            'item' => 'item',
            'amount' => 100,
        ]);
    }

    public function test_update(): void
    {
        $this->test_post();
        $expense = OperationalExpense::first();
//        dd($expense->id);
        $operational = Operational::first();
//        self::assertNotNull($expense);
        $response = $this->patch('/operational/expense/'.$expense->id, [
            'date' => '2021-01-20',
            'item' => 'itembanget',
            'amount' => 10000,
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('operational_expense', [
            'operational_id' => $operational->id,
            'date' => '2021-01-20',
            'item' => 'itembanget',
            'amount' => 10000,
        ]);
    }

    public function testDelete()
    {
        $this->test_post();
        $expense = OperationalExpense::first();
        $operational = Operational::first();
        $this->delete('operational/expense/'. $expense->id);
        $this->assertDatabaseMissing('operational_expense', [
            'operational_id' => $operational->id,
            'date' => '2021-01-01',
            'item' => 'item',
            'amount' => 100,
        ]);
    }


}
