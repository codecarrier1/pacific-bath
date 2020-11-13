<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SalesDocument;
use Faker\Generator as Faker;

$factory->define(SalesDocument::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'template_id' => config('services.helloSign.template_id') ?? $faker->word,
        'is_active' => $faker->boolean($chanceOfGettingTrue = 70),
        'type' => $faker->randomElement(SalesDocument::getReflectedConstants('TYPE_', $asHumane = false)),
    ];
});
