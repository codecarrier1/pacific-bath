<?php

namespace Tests\Unit\Http\Requests;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @see \App\Http\Requests\CreateProductRequest
 */
class CreateProductRequestTest extends TestCase
{
    use RefreshDatabase;

    /** @var \App\Http\Requests\CreateProductRequest */
    private $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RoleAndPermissionSeeder');
        $this->subject = new \App\Http\Requests\CreateProductRequest();
    }

    /**
     * @test
     */
    public function an_admin_user_is_authorized()
    {
        $admin = factory(User::class)->state('admin')->create();
        auth()->login($admin);
        $actual = $this->subject->authorize();
        $this->assertTrue($actual);
    }

    /**
     * @test
     */
    public function a_non_admin_user_is_not_authorized()
    {
        $salesRep = factory(User::class)->state('salesRep')->create();
        auth()->login($salesRep);
        $actual = $this->subject->authorize();
        $this->assertFalse($actual);
    }

    /**
     * @test
     */
    public function rules()
    {
        $actual = $this->subject->rules();

        $this->assertEquals([
            'options' => 'required',
            'sku' => 'required',
            'price' => 'required|numeric',
            'product_category_id' => 'required',
            'product_sub_category_id' => 'required',
        ], $actual);
    }

    // test cases...
}
