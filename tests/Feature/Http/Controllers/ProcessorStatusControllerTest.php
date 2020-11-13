<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Illuminate\Foundation\Testing\WithoutEvents;
use Tests\TestCase;
use App\ProcessorStatus;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @see \App\Http\Controllers\UpdateSalesDispositionController
 */
class ProcessorStatusControllerTest extends TestCase
{
    use RefreshDatabase, WithoutEvents;

    /** @test */
    public function update_returns_an_ok_response_and_updates_the_status_correctly()
    {
        $lead = factory(\App\Lead::class)->create();
        $user = factory(\App\User::class)->create();

        $processorStatus = factory(ProcessorStatus::class)->create();

        $response = $this->actingAs($user)->put(route('processor-status.update', [$lead, 'processorStatusId' => $processorStatus->id]));

        $response->assertOk();
        $lead->refresh();
        $this->assertEquals($processorStatus->id, $lead->processor_status_id);
    }

    // test cases...
}
