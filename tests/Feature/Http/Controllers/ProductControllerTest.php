<?php

namespace Tests\Feature\Http\Controllers;

use App\Product;
use Tests\TestCase;
use App\ProductSubCategory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * @see \App\Http\Controllers\ProductController
 */
class ProductControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function store_returns_an_ok_response_and_creates_a_product()
    {
        $this->withoutExceptionHandling();
        $this->seed('RoleAndPermissionSeeder');
        $user = factory(\App\User::class)->state('admin')->create();
        $subCategory = factory(ProductSubCategory::class)->create();
        $category = $subCategory->productCategory;

        $response = $this->actingAs($user)->post(route('product.store'), [
            'sku' => $this->faker->word,
            'price' => rand(0, 1000),
            'options' => [
              'size' => $this->faker->word,
              'thing' => $this->faker->word,
            ],
            'product_category_id' => $category->id,
            'product_sub_category_id' => $subCategory->id,
        ]);

        $response->assertStatus(201);

        $data = json_decode($response->getContent());

        $product = Product::find($data->id);
        $this->assertInstanceOf(Product::class, $product);
    }

    /**
     * @test
     */
    public function store_validates_with_a_form_request()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductController::class,
            'store',
            \App\Http\Requests\CreateProductRequest::class
        );
    }

    // test cases...
}
