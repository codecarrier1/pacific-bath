<?php

namespace App\Observers;

use App\Option;
use App\Product;
use App\ProductCategory;
use Illuminate\Support\Facades\Cache;

class ProductObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        $options = Option::DEFINITIONS[$product->product_category_id] ?? [];
        foreach ($options as $key => $type) {
            if (empty($key)) {
                continue;
            }

            Option::create([
                'product_id' => $product->id,
                'key' => $key,
                'value' => null,
                'type' => $type,
            ]);
        }
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function saved(Product $product)
    {
        if($product->product_category_id === ProductCategory::SHOWER_PANS){
            Cache::forget('pan_size_' . $product->id);
            Cache::forget('drain_color_' . $product->id);
            Cache::forget('pan_color_' . $product->id);
            Cache::forget('plumbing_position_' . $product->id);
        } else if ($product->product_category_id === ProductCategory::SHOWER_DOORS){
            Cache::forget('description_' . $product->id);
            Cache::forget('glass_color_' . $product->id);
            Cache::forget('trim_color_' . $product->id);
            Cache::forget('width_' . $product->id);
            Cache::forget('height_' . $product->id);

        } else if ($product->product_category_id === ProductCategory::FIXTURES_ACCESSORIES){
            Cache::forget('description_' . $product->id);
            Cache::forget('with_bathtub_' . $product->id);
            Cache::forget('fixture_color_' . $product->id);
        } else if ($product->product_category_id === ProductCategory::WALLS_JOINTS_TRIM){
            Cache::forget('description_' . $product->id);
            Cache::forget('color_id' . $product->id);
        }
    }

}
