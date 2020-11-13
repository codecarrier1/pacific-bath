<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\JobSpecificationQuestionAnswer
 *
 * @property int $id
 * @property int $js_question_id
 * @property int $lead_id
 * @property string|null $answer
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Lead $lead
 * @property-read \App\JobSpecificationQuestion $question
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestionAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestionAnswer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestionAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestionAnswer whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestionAnswer whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestionAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestionAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestionAnswer whereJsQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestionAnswer whereLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestionAnswer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class JobSpecificationQuestionAnswer extends Model
{
    protected $table = 'js_question_answers';
    protected $guarded = [];

    public function question()
    {
        return $this->belongsTo(JobSpecificationQuestion::class, 'js_question_id');
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
