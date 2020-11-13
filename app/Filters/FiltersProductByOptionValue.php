<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Spatie\QueryBuilder\Filters\Filter;

class FiltersProductByOptionValue implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->whereHas('options', function(Builder $query) use ($value, $property){
            return $query->where('value', urldecode($value))->where('key', $property);
        });
    }
}
