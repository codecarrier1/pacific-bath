<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Measurement
 *
 * @property int $id
 * @property float|null $opening_width
 * @property float|null $tub_width
 * @property float|null $right_side_wall
 * @property float|null $right_surround_width
 * @property float|null $room_height
 * @property float|null $left_side_wall
 * @property float|null $left_surround_width
 * @property float|null $ceiling_panel
 * @property float|null $soffit
 * @property float|null $pan_width
 * @property float|null $pan_height
 * @property int $lead_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Lead $lead
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement whereCeilingPanel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement whereLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement whereLeftSideWall($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement whereLeftSurroundWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement whereOpeningWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement wherePanHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement wherePanWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement whereRightSideWall($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement whereRightSurroundWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement whereRoomHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement whereSoffit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement whereTubWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Measurement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Measurement extends Model
{
    protected $guarded = [];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
