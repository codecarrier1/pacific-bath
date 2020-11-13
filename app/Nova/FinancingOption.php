<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class FinancingOption extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\FinancingOption';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
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
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()
                ->sortable(),

            Text::make('Name')
                ->help('a unique identifier for this option'),

            Text::make('Institution')
                ->help('name of the bank or financing company'),

            Number::make('Default Monthly Payment Factor')
                ->min(0)
                ->max(1000)
                ->step(0.00000001)
                ->help('Example: 0.01980')
                ->hideFromIndex(),

            Number::make('Default Interest Rate')
                ->min(0)
                ->max(100)
                ->step(0.01)
                ->help('Example: 6.99')
                ->displayUsing(function ($value) {
                    return "{$value}%";
                }),

            Number::make('Number of Months')
                ->min(0)
                ->max(9999)
                ->step(1),

            Textarea::make('Notes')
                ->help('Any additional information such as terms or conditions of approval')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
