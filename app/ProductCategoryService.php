<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

/**
 * App\ProductCategoryService
 *
 * @property int $id
 * @property int $product_category_id
 * @property int $service_id
 * @property int|null $order_column
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategoryService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategoryService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategoryService ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategoryService query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategoryService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategoryService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategoryService whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategoryService whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategoryService whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategoryService whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductCategoryService extends Pivot implements Sortable
{
    use SortableTrait;

    public function buildSortQuery()
    {
        return static::query()->where('service_id', $this->service_id);
    }
}

