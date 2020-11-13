<?php

namespace Tests\Unit\Http\Requests;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateDiscoveryQuestionAnswerRequestTest extends TestCase
{
    use RefreshDatabase;

    /** @var \App\Http\Requests\UpdateDiscoveryQuestionAnswerRequest */
    private $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RoleAndPermissionSeeder');
        $this->subject = new \App\Http\Requests\UpdateDiscoveryQuestionAnswerRequest;
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
    public function a_sales_rep_is_authorized()
    {
        $salesRep = factory(User::class)->state('salesRep')->create();
        auth()->login($salesRep);
        $actual = $this->subject->authorize();
        $this->assertTrue($actual);
    }

    /**
     * @test
     */
    public function rules()
    {
        $actual = $this->subject->rules();

        $this->assertEquals([
            'answer' => 'required|string',
            'lead_id' => 'required|exists:leads,id',
        ], $actual);
    }
}
