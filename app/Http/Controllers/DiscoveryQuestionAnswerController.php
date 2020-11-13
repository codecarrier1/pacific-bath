<?php

namespace App\Http\Controllers;

use App\DiscoveryQuestion;
use App\DiscoveryQuestionAnswer;
use App\Http\Requests\UpdateDiscoveryQuestionAnswerRequest;

class DiscoveryQuestionAnswerController extends Controller
{
    public function update(UpdateDiscoveryQuestionAnswerRequest $request, DiscoveryQuestion $question)
    {
        /** @var DiscoveryQuestionAnswer $answer */
        $answer = DiscoveryQuestionAnswer::firstOrNew(['lead_id' => $request->input('lead_id'), 'discovery_question_id' => $question->id]);
        $answer->answer = $request->input('answer');
        $answer->save();

        return response()->json($answer->answer);
    }
}
