<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Color;
use App\Option;
use App\Product;
use App\ProductCategory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    // Pick a random product category
    $productCategoryId = $faker->randomElement(ProductCategory::CONSTANTS);

    return [
        'product_category_id' => $productCategoryId,
        'product_sub_category_id' => function () use ($productCategoryId) {
            return factory(App\ProductSubCategory::class)->create(['product_category_id' => $productCategoryId])->id;
        },
        'sku' => strtoupper($faker->randomLetter).$faker->numberBetween($min = 50000, $max = 90000).$faker->numberBetween($min = 0, $max = 9999999),
        'price' => $faker->randomFloat(2, 10, 1000),
        'updated_at' => now(),
        'created_at' => now(),
    ];
});

/**
 * After creating a product, create various relationships
 */
$factory->afterCreating(Product::class, function (Product $myModel, Faker $faker) {
    // Get our product options
    $options = $myModel->options;

    $panSizes = [
      '30x60',
      '40x60',
      '50x60',
      '60x60',
        '60x65',
    ];

    $metalicColors = Color::where('name', 'Polished Chrome')
    ->orWhere('name', 'Brushed Chrome')
    ->orWhere('name', 'Vibrant Titanium')
    ->get();
    $nonMetalicColors = Color::where('name', 'White')
        ->orWhere('name', 'Biscuit')
        ->get();

    // Loop our options and update values with random data
    foreach ($options as $option) {
        // Handle color
        if (Str::endsWith($option->key, 'color_id')) {
            if($myModel->product_category_id === ProductCategory::SHOWER_PANS){
               if($option->key === 'drain_color_id'){
                   $option->value = $metalicColors->random()->id;
               } else if ($option->key === 'pan_color_id'){
                   $option->value = $nonMetalicColors->random()->id;
               }
            } else {
                $option->value = Color::inRandomOrder()->first()->id;
            }
        }

        // Handle positionals
        else if ($option->key === 'plumbing_position') {
            $option->value = Option::POSITIONS[array_rand(Option::POSITIONS)];
        }

        else if (in_array($option->key, ['width', 'depth', 'height'])){
            if($myModel->product_category_id === ProductCategory::SHOWER_PANS){
                $size = $panSizes[array_rand($panSizes)];
                [$width, $depth] = explode('x', $size);
                if($option->key === 'width'){
                    $option->value = $width;
                }
                if($option->key === 'depth'){
                    $option->value = $depth;
                }
            } else {
                $option->value = random_int(30, 96);
            }
        }

        // Handle plain strings
        else if ($option->type == 'string') {
            $option->value = $faker->word;
        }


        // Handle our decimals
        else if ($option->type == 'decimal') {
            $option->value = $faker->randomFloat($decimals = 2, $min = 1, $max = 3000);
        }

        // Update our option
        $option->save();
    }
});
