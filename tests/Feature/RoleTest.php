<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_store(): void
    {
        $response = $this->post('/admin/roles', [
            'name' => 'Admin',
        ]);
        $this->assertDatabaseHas('roles', [
            'name' => 'Admin',
        ]);
    }

    public function test_update(): void
    {
        $this->test_store();

        $response = $this->patch('/admin/roles/1', [
            'name' => 'Admin1',
        ]);

        $this->assertDatabaseHas('roles', [
            'name' => 'Admin1',
        ]);
    }

    public function test_delete(): void
    {
        $response = $this->post('/admin/roles', [
            'name' => 'Admin',
        ]);

        $response = $this->delete('/admin/roles/1');

        $this->assertDatabaseMissing('roles', [
            'name' => 'Admin',
        ]);
    }
}
