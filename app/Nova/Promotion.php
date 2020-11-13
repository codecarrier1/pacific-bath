<?php

namespace App\Nova;

use Benjacho\BelongsToManyField\BelongsToManyField;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class Promotion extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Promotion::class;

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
        'discount',
    ];

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Global Options';

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

            Text::make('Name'),

            Text::make('Type'),

            BelongsToManyField::make('Services', 'services', Service::class),

            Select::make('Discount Type')
            ->options($this->getPromotionTypeValues())
                ->displayUsing(function($value){
                    return Str::title(str_replace('_', ' ', $value));
                })
            ->rules(['required']),

            Number::make('Discount')
                ->min(0)
                ->step(1)
                ->help('Whole percentage value or dollar amount')
                ->displayUsing(function (int $value) {
                    if($this->model()->discount_type === \App\Promotion::DOLLAR_AMOUNT){
                        return '$'.number_format($value);
                    }
                    return "{$value}%";
                }),

            Number::make('Max Value')
                ->displayUsing(function (int $value) {
                    return '$'.number_format($value);
                }),

            Date::make('Begins On')
                ->displayUsing(function (Carbon $value) {
                    return $value->toFormattedDateString();
                }),

            Date::make('Ends On')
                ->displayUsing(function (Carbon $value) {
                    return $value->toFormattedDateString();
                }),
        ];
    }

    private function getPromotionTypeValues()
    {
       $options = [];
       foreach(\App\Promotion::DISCOUNT_TYPES as $type){
           $options[$type] = Str::title(str_replace('_', ' ', $type));
       }
       return $options;
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
