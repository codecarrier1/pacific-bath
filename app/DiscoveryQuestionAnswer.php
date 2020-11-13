<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DiscoveryQuestionAnswer
 *
 * @property int $id
 * @property int $discovery_question_id
 * @property int $lead_id
 * @property string|null $answer
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionAnswer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionAnswer whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionAnswer whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionAnswer whereDiscoveryQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionAnswer whereLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscoveryQuestionAnswer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DiscoveryQuestionAnswer extends Model
{
    protected $guarded = [];
}
