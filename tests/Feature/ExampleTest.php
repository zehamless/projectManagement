<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testAdmin()
    {
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->post('/admin/users', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@test.com',
            'division' => 'IT',
            'roles' => 1,
            'password' => 'password',
            'password_confirmation' => 'password',
            'signature' => $file,
        ]);
        $response->assertSessionHas('success', 'User berhasil ditambahkan');
    }


}
