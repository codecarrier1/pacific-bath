<?php

namespace App\Nova\Filters;

use App\JobSpecificationQuestion;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class ByQuestionType extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where('question_type', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return [
            'Job Specification' => JobSpecificationQuestion::Q_TYPE_SPECIFICATION,
            'Scope of Work' => JobSpecificationQuestion::Q_TYPE_SCOPE_OF_WORK,
        ];
    }
}
