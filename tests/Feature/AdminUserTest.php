<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_role()
    {
        $this->seed([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'admin@admin.com',
        ]);

        $user = User::first();
        $response = $this->actingAs($user)->get('admin/products');

        $response->assertStatus(200);
    }

    public function test_category_access()
    {
        $this->seed([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
        ]);

        $user = User::first();
        $response = $this->actingAs($user)->get('admin/categories');

        $response->assertStatus(200);
    }

    public function test_create_category()
    {
        $this->seed([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
        ]);

        $user = User::first();

        $response = $this->actingAs($user)
            ->postJson('api/v1/category/', [
            'name' => 'Test name',
            'description' => 'Test description'
        ]);

        $response->assertStatus(201);


    }
}
