<?php

namespace App\Filters;

use App\ProductCategory;
use App\ProductSubCategory;
use App\SubModels\ShowerPan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Spatie\QueryBuilder\Filters\Filter;

class FiltersProductByWidthAndDepth implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        [$width, $depth] = explode('x', $value);
        $query->whereHas('options', function(Builder $query) use ($width){
            return $query->where([['key', '=','width'],['value', '=', $width]]);
        })->whereHas('options', function(Builder $query) use ($depth){
            return $query->where([['key', '=','depth'],['value', '=', $depth]]);
        });
    }
}
