<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_avatars_can_be_uploaded(): void
    {
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->post('/admin/users', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@test.com',
            'division' => 'IT',
            'password' => 'password',
            'password_confirmation' => 'password',
            'signature' => $file,
        ]);
        $response->assertSessionHas('success', 'User berhasil ditambahkan');
    }

    public function test_post_without_signature()
    {
        $response = $this->post('/admin/users', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@test.com',
            'division' => 'IT',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $response->assertSessionHas('success', 'User berhasil ditambahkan');

    }

    public function test_update(): void
    {
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->post('/admin/users', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@test.com',
            'division' => 'IT',
            'password' => 'password',
            'password_confirmation' => 'password',
            'signature' => $file,
        ]);
        $userId = User::where('email', 'johndoe@test.com')->first()->id;
        $response = $this->patch('/admin/users/'.$userId, [
            'first_name' => 'John',
            'last_name' => 'Dodoe',
            ]);
        $response->assertSessionHas('success', 'User berhasil diupdate');
    }

    public function test_delete()
    {
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->post('/admin/users', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@test.com',
            'division' => 'IT',
            'password' => 'password',
            'password_confirmation' => 'password',
            'signature' => $file,
        ]);
        $user = User::where('email', 'johndoe@test.com')->first();
        $signature = $user->signature;
        $response = $this->delete('/admin/users/'.$user->id);
        $response->assertSessionHas('success', 'User berhasil dihapus');
        Storage::disk('public')->assertMissing($signature);
    }

}
