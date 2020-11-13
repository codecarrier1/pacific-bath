<?php

namespace App\Http\Controllers;

use App\ConversionType;
use App\DiscoveryQuestion;
use App\JobSpecificationQuestion;
use App\Lead;
use App\PropertyType;

class NeedsAnalysisController extends Controller
{
    public function discoveryQuestions(Lead $lead)
    {
        $questions = DiscoveryQuestion::select(['id', 'question'])->with(['answer' => function ($query) use ($lead) {
            $query->select(['id', 'discovery_question_id', 'answer'])->where('lead_id', $lead->id);
        }])->get();
        return view('needs-analysis.discovery-questions')
            ->with('questions', $questions)
            ->with('lead', $lead);
    }

    public function measurements(Lead $lead)
    {

        $propertyTypes = PropertyType::all()->toJson();
        $conversionTypes = ConversionType::all()->toJson();
        $measurement = $lead->getMeasurement();
        return view('needs-analysis.measurements')
            ->with('propertyTypes', $propertyTypes)
            ->with('conversionTypes', $conversionTypes)
            ->with('measurement', $measurement)
            ->with('lead', $lead->toJson());
    }

    public function jobSpecifications(Lead $lead)
    {
        $selects = [
            'id', 'question', 'type', 'choices', 'allow_additional_comments', 'help_text'
        ];

        $questions = JobSpecificationQuestion::byQuestionType(JobSpecificationQuestion::Q_TYPE_SPECIFICATION)->select($selects)->with(['answer' => function ($query) use ($lead) {
            $query->where('lead_id', $lead->id);
        }])->orderBy('order_column')->get();

        return view('needs-analysis.job-specifications')
            ->with('questions', $questions)
            ->with('lead', $lead);
    }

    public function scopeOfWork(Lead $lead)
    {
        $selects = [
            'id', 'question', 'type', 'choices', 'allow_additional_comments', 'help_text'
        ];

        $questions = JobSpecificationQuestion::byQuestionType(JobSpecificationQuestion::Q_TYPE_SCOPE_OF_WORK)->select($selects)->with(['answer' => function ($query) use ($lead) {
            $query->where('lead_id', $lead->id);
        }])->orderBy('order_column')->get();

        return view('needs-analysis.job-specifications')
            ->with('questions', $questions)
            ->with('lead', $lead);
    }
}
