<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Illuminate\Http\Testing\File;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @see \App\Http\Controllers\ProductSubCategoryController
 */
class ProductSubCategoryControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected $files = [];

    /**
     * @test
     */
    public function show_returns_an_ok_response()
    {
        $product_category = factory(\App\ProductCategory::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get(route('product-sub-category.show', [$product_category]));

        $response->assertOk();
    }

    /**
     * @test
     */
    public function store_returns_an_ok_response()
    {
        $this->withoutExceptionHandling();
        $this->seed('RoleAndPermissionSeeder');
        $product_category = factory(\App\ProductCategory::class)->create();
        $user = factory(\App\User::class)->state('admin')->create();

        $response = $this->actingAs($user)->post(route('product-sub-category.store', [$product_category]), [
            'name' => $this->faker->words(3, true),
            'image' => File::image('sample.png'),
        ]);

        $response->assertStatus(201);

        $data = json_decode($response->getContent());
        $media = Media::find(1);

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function store_validates_with_a_form_request()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductSubCategoryController::class,
            'store',
            \App\Http\Requests\CreateProductSubCategoryRequest::class
        );
    }

    // test cases...
}
