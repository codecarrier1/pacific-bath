<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\QuoteItem::class, function (Faker $faker) {
    return [
        'quote_id' => function () {
            return factory(App\Quote::class)->create()->id;
        },
        'product_id' =>function () {
            return factory(App\Product::class)->create()->id;
        },
        'quantity' => $faker->randomNumber(),
        'price' => $faker->randomFloat(),
        'sku' => $faker->word,
    ];
});
