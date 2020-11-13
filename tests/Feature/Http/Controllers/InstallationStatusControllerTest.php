<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Illuminate\Foundation\Testing\WithoutEvents;
use Tests\TestCase;
use App\SalesDisposition;
use App\InstallationStatus;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InstallationStatusControllerTest extends TestCase
{
    use RefreshDatabase, WithoutEvents;

    /** @test */
    public function update_returns_an_ok_response_and_updates_the_status_correctly()
    {
        $this->withExceptionHandling();
        $lead = factory(\App\Lead::class)->create();
        $user = factory(\App\User::class)->create();

        $installationStatus = factory(InstallationStatus::class)->create();

        $response = $this->actingAs($user)->put(route('installation-status.update', [$lead, 'installationStatusId' => $installationStatus->id]));

        $response->assertOk();
        $lead->refresh();
        $this->assertEquals($installationStatus->id, $lead->installation_status_id);
    }
}
