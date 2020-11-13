<?php

namespace Tests\Feature\Http\Controllers;

use App\Lead;
use App\User;
use Illuminate\Foundation\Testing\WithoutEvents;
use Tests\TestCase;
use App\DiscoveryQuestion;
use App\DiscoveryQuestionAnswer;
use App\DiscoveryQuestionChoice;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateDiscoveryQuestionAnswerControllerTest extends TestCase
{
    use RefreshDatabase, WithoutEvents;

    /** @test */
    public function the_update_method_returns_ok_and_creates_the_discovery_question_answer_when_it_doesnt_exist()
    {
        $this->withoutExceptionHandling();
        $this->seed('RoleAndPermissionSeeder');
        $user = factory(User::class)->state('salesRep')->create();
        $lead = factory(Lead::class)->create(['user_id' => $user->id]);
        $question = factory(DiscoveryQuestion::class)->create();
        $choice = factory(DiscoveryQuestionChoice::class)->create(['discovery_question_id' => $question->id]);
        $data = [
          'lead_id' => $lead->id,
          'answer' => $choice->choice,
        ];
        $response = $this->actingAs($user)->put(route('discovery-question.update', [$question]), $data);
        $response->assertOk();

        $answer = DiscoveryQuestionAnswer::where('lead_id', $lead->id)
            ->where('discovery_question_id', $question->id)
            ->first();
        // It was created or already exists
        $this->assertInstanceOf(DiscoveryQuestionAnswer::class, $answer);
        $this->assertEquals($choice->choice, $answer->answer);
    }

    /** @test */
    public function the_update_method_returns_ok_and_updates_the_discovery_question_answer()
    {
        $this->seed('RoleAndPermissionSeeder');
        $user = factory(User::class)->state('salesRep')->create();
        $lead = factory(Lead::class)->create(['user_id' => $user->id]);
        $question = factory(DiscoveryQuestion::class)->create();
        $choice = factory(DiscoveryQuestionChoice::class)->create(['discovery_question_id' => $question->id]);
        $answer = factory(DiscoveryQuestionAnswer::class)->create(['discovery_question_id' => $question->id, 'lead_id' => $lead->id]);
        $this->assertNotEquals($choice->choice, $answer->answer);
        $data = [
            'lead_id' => $lead->id,
            'answer' => $choice->choice,
        ];
        $response = $this->actingAs($user)->put(route('discovery-question.update', [$question]), $data);
        $response->assertOk();

        $answer->refresh();
        // It was created or already exists
        $this->assertInstanceOf(DiscoveryQuestionAnswer::class, $answer);
        $this->assertEquals($choice->choice, $answer->answer);
    }
}
