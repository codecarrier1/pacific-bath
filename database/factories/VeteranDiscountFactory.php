<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\VeteranDiscount;
use Faker\Generator as Faker;

$factory->define(VeteranDiscount::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'discount' => $faker->numberBetween($min = 5, $max = 10),
        'max_value' => $faker->numberBetween($min = 100, $max = 5000),
    ];
});
