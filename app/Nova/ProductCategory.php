<?php

namespace App\Nova;

use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use MichielKempen\NovaOrderField\Orderable;
use MichielKempen\NovaOrderField\OrderField;

class ProductCategory extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\ProductCategory::class;

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
    public static $group = 'Products';

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'Categories';
    }

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

            HasMany::make('Sub Category', 'subCategories', ProductSubCategory::class),

            Text::make('Name')
                ->sortable(),

            Images::make('Image', 'image')
                ->croppable()
                ->conversionOnIndexView('thumb')
                ->withResponsiveImages()
                ->setFileName(function ($originalFilename, $extension, $model) {
                    return md5($originalFilename).'.'.$extension;
                }),
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
//
//    /**
//     * Build a "relatable" query for the given resource.
//     *
//     * This query determines which instances of the model may be attached to other resources.
//     *
//     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
//     * @param  \Illuminate\Database\Eloquent\Builder  $query
//     * @return \Illuminate\Database\Eloquent\Builder
//     */
//    public static function relatableQuery(NovaRequest $request, $query)
//    {
//        return $query->orderBy(static::$defaultOrderField);
//    }
}
