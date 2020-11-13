<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\DiscoveryQuestionChoice::class, function (Faker $faker) {
    return [
        'choice' => $faker->sentence,
        'order_column' => $faker->randomNumber(),
        'discovery_question_id' => function () {
            return factory(App\DiscoveryQuestion::class)->create()->id;
        },
    ];
});
