<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\DiscoveryQuestionAnswer::class, function (Faker $faker) {
    return [
        'discovery_question_id' => function () {
            return factory(\App\DiscoveryQuestion::class)->create()->id;
        },
        'lead_id' => function () {
            return factory(\App\Lead::class)->create()->id;
        },
        'answer' => $faker->sentence,
        'comment' => $faker->paragraph,
    ];
});
