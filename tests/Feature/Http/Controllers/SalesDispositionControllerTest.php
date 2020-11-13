<?php

namespace Tests\Feature\Http\Controllers;

use App\Lead;
use App\User;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;
use App\SalesDisposition;
use App\Events\LeadAcknowledged;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SalesDispositionControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function update_returns_an_ok_response_and_updates_the_status_correctly_and_doesnt_dispatch_event()
    {
        Event::fake();
        $lead = factory(\App\Lead::class)->create();
        $user = factory(\App\User::class)->create();

        $disposition = factory(SalesDisposition::class)->create();

        $this->assertNotEquals($disposition->id, $lead->sales_disposition_id);

        $response = $this->actingAs($user)->put(route('sales-disposition.update', [$lead, 'salesDispositionId' => $disposition->id]));

        $response->assertOk();
        $lead->refresh();
        $this->assertEquals($disposition->id, $lead->sales_disposition_id);
        Event::assertNotDispatched(LeadAcknowledged::class);
    }

    /** @test */
    public function update_returns_an_ok_response_and_updates_the_status_correctly_and_does_dispatch_event()
    {
        Event::fake();
        Queue::fake();
        $this->seed(\SalesDispositionSeeder::class);
        $lead = factory(\App\Lead::class)->create(['sales_disposition_id' => SalesDisposition::NEW]);
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->put(route('sales-disposition.update', [$lead, 'salesDispositionId' => SalesDisposition::ACKNOWLEDGED]));

        $response->assertOk();
        $lead->refresh();
        $this->assertEquals(SalesDisposition::ACKNOWLEDGED, $lead->sales_disposition_id);
        Event::assertDispatched(LeadAcknowledged::class);
    }
}
