<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\PropertyType::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3, true),
    ];
});
