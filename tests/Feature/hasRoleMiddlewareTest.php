<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class hasRoleMiddlewareTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test1Role(): void
    {
        $users = User::whereHas('hasroles', function ($q) {
            $q->where('name', 'Admin');
        })->first();
        self::assertNotNull($users);
        $response = $this->actingAs($users)->get('/test/admin');
        $response->assertStatus(200);
    }

    public function test2Role()
    {
        //get user with 2 roles
        $users = User::whereHas('hasroles', function ($q) {
            $q->where('name', 'Admin');
        })->whereHas('hasroles', function ($q) {
            $q->where('name', 'Technician');
        })->first();

        self::assertNotNull($users);
        $response = $this->actingAs($users)->get('/test/admin/technician');
        $response->assertStatus(200);
    }

    public function test1roleFailed()
    {
        $users = User::whereHas('hasroles', function ($q) {
            $q->where('name', 'Technician');
        })->first();
        self::assertNotNull($users);
        $response = $this->actingAs($users)->get('/test/admin');
        $response->assertStatus(302);
    }

    public function testrole()
    {
        $user = User::with('hasroles')->first();
        $userRole = $user->hasroles();
        dd($userRole);
    }

}
