<?php

namespace Tests\Feature\Http\Controllers;

use App\ConversionType;
use App\Lead;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutEvents;
use Tests\TestCase;

class ConversionTypeControllerTest extends TestCase
{
    use RefreshDatabase, WithoutEvents;

    /** @test */
    public function it_updates_the_conversion_type_id()
    {
        $this->seed(\RoleAndPermissionSeeder::class);
        $this->seed(\ConversionTypeSeeder::class);
        $user = factory(User::class)->state('salesRep')->create();
        $lead = factory(Lead::class)->create(['user_id' => $user->id]);
        $conversionType = ConversionType::inRandomOrder()->first();
        $response = $this->actingAs($user)->put(route('conversion-type.update', [$lead]),
            ['conversion_type_id' => $conversionType->id]);
        $response->assertStatus(200);
        $lead->refresh();
        $this->assertEquals($conversionType->id, $lead->conversion_type_id);
    }
}
