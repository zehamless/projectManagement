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
        $userRole = $user->hasroles->map(function ($role) {
            return $role->name;
        })->implode(', ');
        dd($userRole);
    }

    public function testSession()
    {
        $users = User::whereHas('hasroles', function ($q) {
            $q->where('name', 'Admin');
        })->first();
        self::assertNotNull($users);
        self::assertTrue($users->hasroles->contains('name', 'Admin'));
        $response = $this->actingAs($users)->post(route('setSession', ['role' => 'Admin']));
        $response->assertJson(['success' => 'Role berhasil di set']);
        $response->assertSessionHas('role', 'Admin');

    }

    public function testName()
    {
        $users = User::Role(['Admin', 'Sales Executive'])->get();
        dd($users);
    }


}
