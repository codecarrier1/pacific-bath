<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Medalink\Reflects\Constants as ReflectsConstants;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

/**
 * App\JobSpecificationQuestion
 *
 * @property int $id
 * @property string $question
 * @property int $order_column
 * @property string $type
 * @property object|null $choices
 * @property int $allow_additional_comments
 * @property string|null $help_text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $question_type
 * @property-read \App\JobSpecificationQuestionAnswer $answer
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestion byQuestionType($type)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestion ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestion whereAllowAdditionalComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestion whereChoices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestion whereHelpText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestion whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestion whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestion whereQuestionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestion whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JobSpecificationQuestion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class JobSpecificationQuestion extends Model implements Sortable
{
    use ReflectsConstants, SortableTrait;

    /**
     * Define our question types
     */
    const Q_TYPE_SPECIFICATION = 'SPECIFICATION';
    const Q_TYPE_SCOPE_OF_WORK = 'SCOPE_OF_WORK';

    /**
     * Define our field types
     */
    const F_TYPE_YES_OR_NO = 'yesno-choice';
    const F_TYPE_MULTIPLE_CHOICE = 'multiple-choice';
    const F_TYPE_TEXT = 'text-field';
    const F_TYPE_LONGTEXT = 'long-text-field';

    protected $table = 'js_questions';

    protected $casts = [
        'choices' => 'object',
    ];

    protected $guarded = [];

    /**
     * This method must be constrained by Lead ID when called or it will not
     * return the desired results.
     */
    public function answer()
    {
        return $this->hasOne(JobSpecificationQuestionAnswer::class, 'js_question_id');
    }

    /**
     * Scope a query to only include users of a given type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByQuestionType(Builder $query, string $type)
    {
        return $query->where('question_type', $type);
    }

    public function getChoicesJson(Lead $lead)
    {
        $answer = $this->answer()->select('answer')->where('lead_id', $lead->id)->first();
        $array = [];
        foreach ($this->choices as $choice) {
            $array[] = ['answer' => $choice->attributes->choice, 'state' => (optional($answer)->answer === $choice->attributes->choice)];

        }
        return json_encode($array);
    }


}
