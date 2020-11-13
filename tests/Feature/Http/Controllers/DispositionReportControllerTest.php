<?php

namespace Tests\Feature\Http\Controllers;

use App\DispositionReport;
use App\Lead;
use App\Payment;
use App\Quote;
use App\QuoteItem;
use App\SalesDisposition;
use App\Service;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutEvents;
use Tests\TestCase;

class DispositionReportControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker, WithoutEvents;
    /** @test */
    public function it_stores_the_report_and_returns_a_201_response_for_a_new_report()
    {
        $this->seed(\RoleAndPermissionSeeder::class);
        $service = factory(Service::class)->create();
        $user = factory(User::class)->state('salesRep')->create();
        $disposition = factory(SalesDisposition::class)->create();
        $lead = factory(Lead::class)->create(['user_id' => $user->id]);
        $data = factory(DispositionReport::class)->raw([
            'user_id' => $user->id,
            'lead_id' => $lead->id,
            'service_name' => $service->name,
            'disposition_status' => $disposition->name,
            'disposition_status_id' => $disposition->id,
            'disposition_report_id' => null,
            ]);
        $response = $this->actingAs($user)->post(route('disposition.store'), $data);
        unset($data['disposition_report_id']);
        unset($data['disposition_status_id']);
        $response->assertStatus(201);
        $this->assertDatabaseHas('disposition_reports', $data);
    }

    /** @test */
    public function it_updates_the_report_and_returns_a_200_response_for_an_existing_report()
    {
        $this->seed(\RoleAndPermissionSeeder::class);
        $service = factory(Service::class)->create();
        $user = factory(User::class)->state('salesRep')->create();
        $disposition = factory(SalesDisposition::class)->create();
        $lead = factory(Lead::class)->create(['user_id' => $user->id]);
        $report = factory(DispositionReport::class)->create([
            'user_id' => $user->id,
            'lead_id' => $lead->id,
        ]);
        $data = factory(DispositionReport::class)->raw([
            'user_id' => $user->id,
            'lead_id' => $lead->id,
            'service_name' => $service->name,
            'disposition_status' => $disposition->name,
            'disposition_status_id' => $disposition->id,
            'disposition_report_id' => $report->id,
        ]);
        $response = $this->actingAs($user)->post(route('disposition.store'), $data);
        unset($data['disposition_report_id']);
        unset($data['disposition_status_id']);
        $response->assertStatus(200);
        $this->assertDatabaseHas('disposition_reports', $data);
    }

    /** @test */
    public function it_shows_the_data_needed_for_the_disposition_report_form()
    {
        $this->withoutExceptionHandling();
        $this->seed(\RoleAndPermissionSeeder::class);
        $this->seed(\SalesDispositionSeeder::class);
        $payment = factory(Payment::class)->create();
        $lead = $payment->lead;
        if($value = (bool)rand(0,1)){
            $report = factory(DispositionReport::class)->create([
                'user_id' => $lead->user_id,
                'lead_id' => $lead->id,
            ]);
            $lead->refresh();
        }
        $data = [
            'last_name' => $lead->last_name,
            'dispositions' => SalesDisposition::select('id', 'name')->get(),
            'service_name' => $lead->service->name,
            'amount' => $lead->payment->discounted_total,
            'current_disposition_id' => $lead->sales_disposition_id,
            'disposition_report' => $lead->dispositionReport,
            'user_id' => (int)$lead->user_id,
        ];
        auth()->login($lead->user);
        $response = $this->get(route('disposition.show', ['lead' => $lead->id]));
        $response->assertOk();
        $this->assertSame(json_encode($data), $response->getContent());
    }
}
