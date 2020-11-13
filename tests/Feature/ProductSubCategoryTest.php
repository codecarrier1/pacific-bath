<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use App\ProductCategory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductSubCategoryTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->seed('ProductCategorySeeder');
        $this->seed('ProductSubCategorySeeder');
        $this->seed('RoleAndPermissionSeeder');
        $user = factory(User::class)->state('admin')->create();
        auth()->login($user);
    }

    /** @test */
    public function all_sub_categories_can_be_listed()
    {
        $category = ProductCategory::inRandomOrder()->firstOrFail();
        $response = $this->get(route('product-sub-category.show', [$category]));

        $response->assertStatus(200);

        $response->assertExactJson($category->subCategories->toArray());
    }

    /** @test */
    public function a_product_sub_category_can_be_created()
    {
        $this->withoutExceptionHandling();
        $category = ProductCategory::inRandomOrder()->firstOrFail();
        $data = [
            'name' => $this->faker->sentence,
            'image' => UploadedFile::fake()->image('image.png'),
        ];
        $request = $this->postJson(route('product-sub-category.store', [$category]), $data);

        $request->assertStatus(201);

        $media = json_decode($request->getContent(), true);

        // This is only returned if the media is successfully attached to the Model
        $this->assertArrayHasKey('collection_name', $media);

        // We will rely on the tests from Spatie to make sure the file upload is working
    }
}