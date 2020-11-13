<?php

namespace Tests\Feature\Http\Controllers;

use App\Lead;
use App\User;
use Tests\TestCase;
use App\ProcessorStatus;
use App\SalesDisposition;
use App\InstallationStatus;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @see \App\Http\Controllers\SalesRepDashboardController
 */
class SalesRepDashboardControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function charts_returns_an_ok_response()
    {
        $this->seed(\LocationSeeder::class);
        $this->seed(\RoleAndPermissionSeeder::class);
        $this->seed(\SalesDispositionSeeder::class);
        $this->seed(\ProcessorStatusSeeder::class);
        $this->seed(\InstallationStatusSeeder::class);
        $this->seed(\FakeUserSeeder::class);
        $user = factory(\App\User::class)->state('salesRep')->create();
        Lead::flushEventListeners();;
        $leads = factory(Lead::class, 10)->create(['user_id' => $user->id]);
        $soldLeads = factory(Lead::class, 5)->state('sold')->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('sales.dashboard.charts', [$user]));

        $response->assertOk();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function show_returns_an_ok_response()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('dashboard.mine'));
        $response->assertOk();
    }
}
