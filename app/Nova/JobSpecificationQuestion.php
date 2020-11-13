<?php

namespace App\Nova;

use App\Nova\Filters\ByQuestionType;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use MichielKempen\NovaOrderField\Orderable;
use MichielKempen\NovaOrderField\OrderField;
use Whitecube\NovaFlexibleContent\Flexible;
use App\JobSpecificationQuestion as JobSpec;

class JobSpecificationQuestion extends Resource
{
    use Orderable;

    public static $defaultOrderField = 'order_column';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\JobSpecificationQuestion';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'question',
        'question_type',
    ];

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Settings';

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Select::make('Question Type')->options($this->getQuestionTypeOptions())->displayUsingLabels(),
            Text::make('Question'),
            Select::make('Type')->options([
                JobSpec::F_TYPE_YES_OR_NO => 'Yes/No Choice',
                JobSpec::F_TYPE_MULTIPLE_CHOICE => 'Multiple Choice',
                JobSpec::F_TYPE_TEXT => 'Text Field',
                JobSpec::F_TYPE_LONGTEXT => 'Long Text Field',
            ])->displayUsingLabels(),
            Boolean::make('Allow Additional Comments'),
            OrderField::make('Order'),
            NovaDependencyContainer::make([
                Flexible::make('Choices')->addLayout('Answer choices', 'choices', [
                    Text::make('Choice'),
                ])->button('Add Answer Choice'),
            ])->dependsOn('type', 'multiple-choice'),
            NovaDependencyContainer::make([
                Flexible::make('Yes/No Labels', 'choices')->addLayout('Label', 'choices', [
                    Text::make('Choice'),
                ])->button('Add Answer Labels')->limit(2)->help("You may optionally add two answer labels. If you don't, then the default will be Yes and No."),
            ])->dependsOn('type', 'yesno-choice'),
            NovaDependencyContainer::make([
                Text::make('Help Text')->help("If left blank, the prompt will simply be 'Additional Comments'. Use this for things such as 'if yes, provide measurements'")
            ])->dependsOn('allow_additional_comments', true),

        ];
    }


    protected function getQuestionTypeOptions()
    {
        return [
            JobSpec::Q_TYPE_SPECIFICATION => 'Job Specification' ,
            JobSpec::Q_TYPE_SCOPE_OF_WORK => 'Scope of Work',
        ];
    }


    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new ByQuestionType,
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
