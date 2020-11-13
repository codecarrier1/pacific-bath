<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->word,
        'address_2' => $faker->word,
        'city' => $faker->city,
        'state' => $faker->word,
        'zip' => $faker->postcode,
        'phone' => $faker->phoneNumber,
    ];
});
