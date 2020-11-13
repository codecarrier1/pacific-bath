<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Option;
use Faker\Generator as Faker;

$factory->define(Option::class, function (Faker $faker) {
    return [
        'key' => $faker->word,
        'value' => $faker->word,
        'type' => $faker->randomElement(Option::allowableTypes()
            ->toArray()),
        'product_id' => function () {
            return factory(App\Product::class)->create()->id;
        },
    ];
});
