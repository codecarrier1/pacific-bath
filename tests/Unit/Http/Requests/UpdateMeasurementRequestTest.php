<?php

namespace Tests\Unit\Http\Requests;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateMeasurementRequestTest extends TestCase
{
    use RefreshDatabase;

    /** @var \App\Http\Requests\UpdateMeasurementsRequest */
    private $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RoleAndPermissionSeeder');
        $this->subject = new \App\Http\Requests\UpdateMeasurementsRequest();
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
            'opening_width' => 'sometimes|required|numeric',
            'tub_width' => 'sometimes|required|numeric',
            'right_side_wall' => 'sometimes|required|numeric',
            'right_surround_width' => 'sometimes|required|numeric',
            'room_height' => 'sometimes|required|numeric',
            'left_side_wall' => 'sometimes|required|numeric',
            'left_surround_width' => 'sometimes|required|numeric',
            'ceiling_panel' => 'sometimes|required|numeric',
            'soffit' => 'sometimes|required|numeric',
            'pan_width' => 'sometimes|required|numeric',
            'pan_height' => 'sometimes|required|numeric',
        ], $actual);
    }
}
