<?php

namespace Tests\Feature\Product;

use App\Models\User;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_product()
    {
        $this->seed([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
        ]);

        $user = User::first();

        $response = $this->actingAs($user)
            ->postJson('api/v1/product/', [
                'title' => 'Test name',
                'description' => 'Test description',
                'category_id' => 2,
                'short_description' => 'Test description',
                'price' => 99,
                'SKU' => 'fwdqq',
                'in_stock' => 21,
                'discount' => 1,
            ]);

        $response->assertStatus(201);
    }
}
