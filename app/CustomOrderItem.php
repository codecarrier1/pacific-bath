<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CustomOrderItem
 *
 * @property int $id
 * @property int $product_id
 * @property int $lead_id
 * @property mixed $options
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomOrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomOrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomOrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomOrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomOrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomOrderItem whereLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomOrderItem whereOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomOrderItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomOrderItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CustomOrderItem extends Model
{
    //
}
