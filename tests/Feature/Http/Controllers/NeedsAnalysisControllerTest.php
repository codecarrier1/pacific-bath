<?php

namespace Tests\Feature\Http\Controllers;

use App\ConversionType;
use App\JobSpecificationQuestion;
use App\Lead;
use App\PropertyType;
use App\User;
use Illuminate\Foundation\Testing\WithoutEvents;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NeedsAnalysisControllerTest extends TestCase
{

    use RefreshDatabase, WithoutEvents;

    /** @test */
    public function measurements_returns_an_ok_response()
    {
        $this->seed('ConversionTypeSeeder');
        $this->seed('PropertyTypeSeeder');
        $user = factory(User::class)->create();
        $lead = factory(Lead::class)->create(['user_id' => $user->id]);
        $response = $this->actingAs($user)->get(route('measurements.calculate', [$lead]));
        $response->assertStatus(200);
        $response->assertViewIs('needs-analysis.measurements');
        $response->assertSee('Base Measurement');
//        $conversionTypes = ConversionType::all(['name']);
//        $projectTypes = PropertyType::all(['name']);
//        foreach ($conversionTypes as $conversionType) {
//           // $response->assertSee($conversionType->name);
//        }
//        foreach ($projectTypes as $projectType) {
//            //$response->assertSee($projectType->name);
//        }
    }

   /** @test */
    public function discoveryQuestions_returns_an_ok_response()
    {
        $this->withoutExceptionHandling();
        $lead = factory(\App\Lead::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get(route('discovery.questions', [$lead]));

        $response->assertOk();

        // TODO: perform additional assertions
    }

    /** @test */
    public function jobSpecifications_returns_an_ok_reponse()
    {
        $lead = factory(\App\Lead::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get(route('job-specifications', [$lead]));

        $questions = JobSpecificationQuestion::with(['answers' => function($query) use ($lead){
            $query->where('lead_id', $lead->id);
        }])->get();

        $response->assertOk();
    }
}
