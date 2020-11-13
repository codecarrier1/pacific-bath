<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateJobSpecificationQuestionAnswerRequest;
use App\JobSpecificationQuestion;
use App\JobSpecificationQuestionAnswer;
use Illuminate\Http\Request;

class JobSpecificationQuestionAnswerController extends Controller
{
    public function update(UpdateJobSpecificationQuestionAnswerRequest $request, JobSpecificationQuestion $question)
    {
        /** @var JobSpecificationQuestionAnswer $answer */
        $answer = JobSpecificationQuestionAnswer::firstOrNew(['lead_id' => $request->input('lead_id'), 'js_question_id' => $question->id]);
        if($request->has('answer')){
            $answer->answer = $request->input('answer');
        }
        if($request->has('comment')){
            $answer->comment = $request->input('comment');
        }
        $answer->save();
        return response()->json($answer->toArray());
    }
}
