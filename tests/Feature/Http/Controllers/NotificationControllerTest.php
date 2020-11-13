<?php

namespace Tests\Feature\Http\Controllers;

use App\Lead;
use App\User;
use Illuminate\Foundation\Testing\WithoutEvents;
use Tests\TestCase;
use App\SalesDisposition;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotificationControllerTest extends TestCase
{
    use RefreshDatabase, WithoutEvents;

    /** @test */
    public function show_returns_the_number_of_unacknowledged_leads()
    {
        $this->seed('RoleAndPermissionSeeder');
        $user = factory(User::class)->state('salesRep')->create();
        $leads = factory(Lead::class, 20)->create(['user_id' => $user->id]);
        $numberUnacknowledged = $leads->where('is_acknowledged', 0)->count();
        $response = $this->actingAs($user)->get(route('leads.unacknowledged'));
        $response->assertOk();
        $this->assertEquals($numberUnacknowledged, $response->getContent());
    }

    /** @test */
    public function update_decreases_the_number_of_unacknowledged_leads()
    {
        $this->expectsEvents(\App\Events\LeadAcknowledged::class);
        $this->seed('RoleAndPermissionSeeder');
        $this->seed('SalesDispositionSeeder');
        $user = factory(User::class)->state('salesRep')->create();
        $lead = factory(Lead::class)->create(['user_id' => $user->id, 'is_acknowledged' => 0, 'sales_disposition_id' => SalesDisposition::NEW]);
        $disposition = SalesDisposition::where('id', '!=', SalesDisposition::NEW)->inRandomOrder()->first();
        $this->assertEquals(1, $user->leads()->where('is_acknowledged', 0)->count());
        $response = $this->actingAs($user)->get(route('lead.acknowledge', ['lead' => $lead, 'disposition' => $disposition]));
        $response->assertOk();
        $lead->refresh();
        $this->assertEquals(0, $user->leads()->where('is_acknowledged', 0)->count());
        $this->assertEquals($lead->sales_disposition_id, $disposition->id);
        $this->assertEquals($lead->is_acknowledged, 1);
    }
}
