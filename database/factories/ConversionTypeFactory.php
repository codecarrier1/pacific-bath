<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\ConversionType::class, function (Faker $faker) {
    return [
        'name' => $faker->words(4, true),
    ];
});
