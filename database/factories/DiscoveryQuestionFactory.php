<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\DiscoveryQuestion::class, function (Faker $faker) {
    return [
        'question' => str_replace('.', '?', $faker->sentence),
        'order_column' => $faker->randomNumber(),
    ];
});
