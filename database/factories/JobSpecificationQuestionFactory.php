<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\JobSpecificationQuestion::class, function (Faker $faker) {
    $type = ['multiple-choice', 'yesno-choice', 'text-field', 'long-text-field'];
    $index = array_rand($type);
    return [
        'question' => $faker->sentence,
        'order_column' => $faker->randomNumber(),
        'type' => $type[$index],
    ];
});
