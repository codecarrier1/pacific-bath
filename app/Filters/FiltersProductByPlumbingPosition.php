<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Spatie\QueryBuilder\Filters\Filter;

class FiltersProductByPlumbingPosition implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {

        if($value === 'Right/Left'){
            $query->whereHas('options', function(Builder $query) use ($value){
                return $query->where('value', 'Left')->where('key', 'plumbing_position');
            })->orWhereHas('options', function(Builder $query) use ($value){
                return $query->where('value', 'Right')->where('key', 'plumbing_position');
            });
        } else {
            $query->whereHas('options', function(Builder $query) use ($value){
                return $query->where('value', $value)->where('key', 'plumbing_position');
            });
        }


    }
}
