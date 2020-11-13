<?php

namespace Tests\Feature\Http\Controllers;

use App\DiscoveryQuestion;
use App\DiscoveryQuestionAnswer;
use App\Lead;
use App\User;
use Illuminate\Foundation\Testing\WithoutEvents;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DiscoveryQuestionAnswerControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    use WithoutEvents;

    /** @test */
    public function it_returns_a_json_response_containing_the_new_answer()
    {
        $this->seed(\RoleAndPermissionSeeder::class);
        $user = factory(User::class)->state('salesRep')->create();
        $lead = factory(Lead::class)->create(['user_id' => $user->id]);
        $question = factory(DiscoveryQuestion::class)->create();
        $answer = $this->faker->paragraph;
        $data = ['lead_id' => $lead->id, 'answer' => $answer];
        $response = $this->actingAs($user)->put(route('discovery-question.update', [$question]), $data);
        $response->assertStatus(200);
        $response->assertSeeText($answer);
        $latest = DiscoveryQuestionAnswer::latest()->first();
        $this->assertEquals($answer, $latest->answer);
    }
}
