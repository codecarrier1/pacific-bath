<?php

namespace App\Scopes;

use App\ProductCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

/**
 * Class WallJointTrimScope
 *
 * @package App\Scopes
 */
class FixtureAccessoryScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('product_category_id', '=', ProductCategory::FIXTURES_ACCESSORIES);
    }
}
