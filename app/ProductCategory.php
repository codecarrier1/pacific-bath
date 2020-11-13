<?php

namespace App;

use App\SubModels\BathTub;
use App\SubModels\BathTubDoor;
use App\SubModels\BathTubDrain;
use App\SubModels\ConstructionAddition;
use App\SubModels\FixtureAccessory;
use App\SubModels\ShowerDoor;
use App\SubModels\ShowerPan;
use App\SubModels\ShowerPanDrain;
use App\SubModels\WalkInBath;
use App\SubModels\WallJointTrim;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

/**
 * App\ProductCategory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Service[] $services
 * @property-read int|null $services_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductSubCategory[] $subCategories
 * @property-read int|null $sub_categories_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductCategory extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded = [];

    const SHOWER_PANS = 1;

    const WALLS_JOINTS_TRIM = 2;

    const FIXTURES_ACCESSORIES = 3;

    const SHOWER_DOORS = 4;

    const CONSTRUCTION_ADDITIONS = 5;

    const WALK_IN_BATHS = 6;

    const BATHTUBS = 7;

    const BATHTUB_DOORS = 8;

    const SHOWER_PAN_DRAINS = 9;

    const BATHTUB_DRAINS = 10;

    /**
     * Sole purpose of this array is to make generating a random id in the Product factory faster/easier.
     */
    const CONSTANTS = [
        self::SHOWER_PANS,
        self::WALLS_JOINTS_TRIM,
        self::FIXTURES_ACCESSORIES,
        self::SHOWER_DOORS,
        self::CONSTRUCTION_ADDITIONS,
        self::WALK_IN_BATHS,
        self::BATHTUBS,
        self::BATHTUB_DOORS,
        self::SHOWER_PAN_DRAINS,
        self::BATHTUB_DRAINS,
    ];

    const SERVICES = [
        Service::SHOWERS => [
            self::SHOWER_PANS,
            self::WALLS_JOINTS_TRIM,
            self::FIXTURES_ACCESSORIES,
            self::SHOWER_DOORS,
            self::CONSTRUCTION_ADDITIONS,
        ],
        Service::BATHTUBS => [
            self::BATHTUBS,
            self::WALLS_JOINTS_TRIM,
            self::FIXTURES_ACCESSORIES,
            self::BATHTUB_DOORS,
            self::CONSTRUCTION_ADDITIONS,
        ],
        Service::WALK_INS => [
            self::WALK_IN_BATHS,
            self::WALLS_JOINTS_TRIM,
            self::FIXTURES_ACCESSORIES,
            self::BATHTUB_DOORS,
            self::CONSTRUCTION_ADDITIONS,
        ],
    ];


    const SUB_MODELS = [
        self::SHOWER_PANS => ShowerPan::class,
        self::WALLS_JOINTS_TRIM => WallJointTrim::class,
        self::FIXTURES_ACCESSORIES => FixtureAccessory::class,
        self::SHOWER_DOORS => ShowerDoor::class,
        self::CONSTRUCTION_ADDITIONS => ConstructionAddition::class,
        self::WALK_IN_BATHS => WalkInBath::class,
        self::BATHTUBS => BathTub::class,
        self::BATHTUB_DOORS => BathTubDoor::class,
        self::SHOWER_PAN_DRAINS => ShowerPanDrain::class,
        self::BATHTUB_DRAINS => BathTubDrain::class,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategories(): HasMany
    {
        return $this->hasMany(ProductSubCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }

    /**
     * Register a single image for our category
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }

    /**
     * @param  \Spatie\MediaLibrary\Models\Media|null  $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10)
            ->nonQueued();
    }
}
