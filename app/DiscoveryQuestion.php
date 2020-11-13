<?php

namespace App;

use Spatie\EloquentSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;

/**
 * App\DiscoveryQuestion
 *
 * @property int $id
 * @property string $question
 * @property int $order_column
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\DiscoveryQuestionAnswer $answer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\DiscoveryQuestionChoice[] $choices
 * @property-read int|null $choices_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestion ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestion whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestion whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DiscoveryQuestion extends Model implements Sortable
{
    use SortableTrait;

    protected $guarded = [];

    public function choices()
    {
        return $this->hasMany(DiscoveryQuestionChoice::class);
    }

    /**
     * This method must be constrained by Lead ID when called or it will not
     * return the desired results.
     */
    public function answer()
    {
        return $this->hasOne(DiscoveryQuestionAnswer::class);
    }


}
