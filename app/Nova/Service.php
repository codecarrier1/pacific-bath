<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Panel;
use MichielKempen\NovaOrderField\OrderField;

class Service extends Resource
{

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Service::class;

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
            Text::make('Description'),
            new Panel('Service Level - Additional Discounts', $this->additionalDiscountFields()),
            BelongsToMany::make('Product Categories', 'productCategories', ProductCategory::class)->fields(function () {
                return [
                    OrderField::make('Order'),
                ];
            }),
            BelongsToMany::make('Sales Documents', 'salesDocuments'),
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

    /**
     * Get our additional discount tier fields
     *
     * @return array
     */
    protected function additionalDiscountFields(): array
    {
        return [
            Number::make('Tier 1')
                ->help('Ex: 1000')
                ->displayUsing(function (?int $value) {
                    return '$'.number_format($value);
                }),

            Number::make('Tier 2')
                ->help('Ex: 2000')
                ->displayUsing(function (?int $value) {
                    return '$'.number_format($value);
                }),

            Number::make('Tier 3')
                ->help('Ex: 3000')
                ->displayUsing(function (?int $value) {
                    return '$'.number_format($value);
                }),
        ];
    }
}
