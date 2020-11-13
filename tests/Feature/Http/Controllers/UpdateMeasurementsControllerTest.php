<?php

namespace Tests\Feature\Http\Controllers;

use App\Lead;
use App\User;
use Tests\TestCase;
use App\Measurement;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateMeasurementsControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_updates_the_measurement_object()
    {
        $this->seed('RoleAndPermissionSeeder');
        Lead::flushEventListeners();;
        $user = factory(User::class)->state('salesRep')->create();
        $lead = factory(Lead::class)->create(['user_id' => $user->id]);
        $measurement = factory(Measurement::class)->create(['lead_id' => $lead->id]);
        $data = $this->getRandomRequestData();
        $response = $this->actingAs($user)->put(route('measurement.update', [$measurement]), $data);
        $response->assertOk();
        $measurement->refresh();
        foreach ($data as $key => $value) {
            $this->assertEquals($measurement->{$key}, $value);
        }
    }

    protected function getRandomRequestData()
    {
        // Get the data
        $data = $this->requestData();
        // Start anywhere from the beginning to 1 less than the end ( because of zero index )

        $start = rand(0, (count($data) - 1));
        // Length of it is the start position, adding 1 for zero index, subtracted from the count of the whole
        try {
            $length = rand(1, (count($data) - ($start + 1)));
        } catch (\Throwable $e) {
            $length = 1;
        }

        return array_slice($data, $start, $length, true);
    }

    protected function requestData()
    {
        return [
            'opening_width' => $this->faker->randomFloat(2, 20, 120),
            'tub_width' => $this->faker->randomFloat(2, 20, 120),
            'right_side_wall' => $this->faker->randomFloat(2, 70, 120),
            'right_surround_width' => $this->faker->randomFloat(2, 70, 120),
            'room_height' => $this->faker->randomFloat(2, 70, 120),
            'left_side_wall' => $this->faker->randomFloat(2, 70, 120),
            'left_surround_width' => $this->faker->randomFloat(2, 70, 120),
            'ceiling_panel' => $this->faker->randomFloat(2, 80, 150),
            'soffit' => $this->faker->randomFloat(2, 20, 50),
            'pan_width' => $this->faker->randomFloat(2, 20, 120),
            'pan_height' => $this->faker->randomFloat(2, 5, 20),
        ];
    }
}
