<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductInformation;
use Faker\Generator as Faker;

$factory->define(ProductInformation::class, function (Faker $faker) {
    return [
        'service_id' => \App\Service::first()->id || factory(\App\Service::class),
        'type' => $faker->randomElement(ProductInformation::getReflectedConstants('TYPE_')),
        'content' => $faker->paragraphs($total = 1, $asText = true),
        'weight' => 1,
    ];
});
