<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\ProductSubCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'product_category_id' => function () {
            return factory(App\ProductCategory::class)->create()->id;
        },
    ];
});
