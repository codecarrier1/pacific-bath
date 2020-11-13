<?php

namespace Tests\Feature\Http\Controllers;

use App\JobSpecificationQuestion;
use App\Lead;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Support\Str;
use Tests\TestCase;

class JobSpecificationQuestionAnswerControllerTest extends TestCase
{
    use RefreshDatabase, WithoutEvents;

    /** @test */
    public function it_updates_or_creates_an_existing_job_spec_question_answer()
    {
        $this->seed(\RoleAndPermissionSeeder::class);
        $this->withoutExceptionHandling();
        $user = factory(User::class)->state('salesRep')->create();
        $lead = factory(Lead::class)->create(['user_id' => $user->id]);
        $question = factory(JobSpecificationQuestion::class)->create();
        $data = ['answer' => 'hellobob', 'lead_id' => $lead->id];
        $response = $this->actingAs($user)->put(route('job-specification-question.update', [$question]), $data);
        $response->assertStatus(200);
    }
}
