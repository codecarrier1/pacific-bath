<?php

namespace App\Http\Controllers;

use App\Color;
use App\Filters\FiltersProductByOptionValue;
use App\Filters\FiltersProductByPlumbingPosition;
use App\Filters\FiltersProductByWidthAndDepth;
use App\Interfaces\SubModel;
use App\ProductCategory;
use App\ProductSubCategory;
use Illuminate\Support\Collection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class OptionsController extends Controller
{
    public function show(ProductCategory $category)
    {
        // Define which filters are allowed for the frontend query
        $allowedFilters = [
            AllowedFilter::custom('plumbing_position', new FiltersProductByPlumbingPosition),
            AllowedFilter::custom('drain_color_id', new FiltersProductByOptionValue),
            AllowedFilter::custom('pan_color_id', new FiltersProductByOptionValue),
            AllowedFilter::custom('color_id', new FiltersProductByOptionValue),
            AllowedFilter::custom('description', new FiltersProductByOptionValue),
            AllowedFilter::custom('size', new FiltersProductByWidthAndDepth),
            'product_sub_category_id',
        ];
        // Determine the submodel class to run the query against
        $class = ProductCategory::SUB_MODELS[$category->id];
        // Run the query
        $products =  QueryBuilder::for($class)->allowedIncludes(['options'])
            ->allowedFilters($allowedFilters)
            ->get();
        // Calculate and format the data needed for the frontend
        $responseData = call_user_func($class . '::getResponseData', $products);
        // return it
        return response()->json($responseData);
    }

}
