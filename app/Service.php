<?php

namespace App;

use App\Exceptions\IncorrectServiceName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Service
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $tier_3
 * @property int|null $tier_2
 * @property int|null $tier_1
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Lead[] $leads
 * @property-read int|null $leads_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductCategory[] $productCategories
 * @property-read int|null $product_categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Promotion[] $promotions
 * @property-read int|null $promotions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SalesDocument[] $salesDocuments
 * @property-read int|null $sales_documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\VeteranDiscount[] $veteranDiscounts
 * @property-read int|null $veteran_discounts_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereTier1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereTier2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereTier3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Service extends Model
{
    const SHOWERS = 1;

    const WALK_INS = 2;

    const BATHTUBS =3;

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }

    public function productCategories(): BelongsToMany
    {
        return $this->belongsToMany(ProductCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function promotions(): BelongsToMany
    {
        return $this->belongsToMany(Promotion::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function veteranDiscounts(): BelongsToMany
    {
        return $this->belongsToMany(VeteranDiscount::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function salesDocuments(): BelongsToMany
    {
        return $this->belongsToMany(SalesDocument::class);
    }

    /**
     * @param $salesforceName
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     * @throws \App\Exceptions\IncorrectServiceName
     */
    public static function findBySalesforceName($salesforceName)
    {
        $service = Service::where('name', $salesforceName)
            ->first();

        if (!$service) {
            throw new IncorrectServiceName;
        }

        return $service;
    }
}
