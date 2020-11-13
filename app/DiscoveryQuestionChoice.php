<?php

namespace App;

use Spatie\EloquentSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;

/**
 * App\DiscoveryQuestionChoice
 *
 * @property int $id
 * @property string $choice
 * @property int $order_column
 * @property int $discovery_question_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\DiscoveryQuestion $question
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionChoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionChoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionChoice ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionChoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionChoice whereChoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionChoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionChoice whereDiscoveryQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionChoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionChoice whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionChoice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DiscoveryQuestionChoice extends Model implements Sortable
{
    use SortableTrait;

    protected $guarded = [];

    public function question()
    {
        return $this->belongsTo(DiscoveryQuestion::class);
    }
}
