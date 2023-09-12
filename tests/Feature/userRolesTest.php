<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Database\Seeders\userSeed;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class userRolesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_attach1Role(): void
    {
        $this->seed([RoleSeeder::class, userSeed::class]);
        $this->assertDatabaseHas('roles', [
            'name'=> 'Admin'
        ]);
        $this->assertDatabaseHas('users',[
            'first_name' => 'John',
        ]);
        $user = User::where('first_name', 'John')->first();
        self::assertNotNull($user);

        $user->hasroles()->attach('1');
        $this->assertNotEmpty($user->hasroles);
    }

    public function test_attach2roles()
    {
        $this->seed([RoleSeeder::class, userSeed::class]);

        $user = User::where('first_name', 'John')->first();
        $roles = Role::all();

        $user->hasroles()->attach([1,2,3]);
        self::assertNotEmpty($user->hasroles);
        self::assertSame($user->hasroles->count(), 3);
    }

    public function test_detachRole()
    {
        $this->test_attach2roles();
        $user = User::where('first_name', 'John')->first();
        $user->hasroles()->detach(1);
        self::assertSame($user->hasroles->count(), 2);
    }

    public function test_detach1role()
    {
        $this->test_attach1Role();
        $user = User::where('first_name', 'John' )->first();
        $user->hasroles()->detach(1);

        self::assertEmpty($user->hasroles);

    }


}
