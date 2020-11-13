<?php

namespace Tests\Feature\Http\Controllers;

use App\ConversionType;
use App\Lead;
use App\PropertyType;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutEvents;
use Tests\TestCase;

class PropertyTypeControllerTest extends TestCase
{
    use RefreshDatabase, WithoutEvents;

    /** @test */
    public function it_updates_the_lead_property_type()
    {
        $this->withoutExceptionHandling();
        $this->seed(\RoleAndPermissionSeeder::class);
        $this->seed(\PropertyTypeSeeder::class);
        $user = factory(User::class)->state('salesRep')->create();
        $lead = factory(Lead::class)->create(['user_id' => $user->id]);
        $propertyType = PropertyType::inRandomOrder()->first();
        $response = $this->actingAs($user)->put(route('property-type.update', [$lead]),
            ['property_type_id' => $propertyType->id]);
        $response->assertStatus(200);
        $lead->refresh();
        $this->assertEquals($propertyType->id, $lead->property_type_id);
    }
}
