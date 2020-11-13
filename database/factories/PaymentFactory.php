<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Payment::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'lead_id' => function () {
            return factory(App\Lead::class)->create()->id;
        },
        'quote_id' => function () {
            return factory(App\Quote::class)->create()->id;
        },
        'type' => $faker->word,
        'final_type' => $faker->word,
        'deposit' => $faker->randomFloat(),
        'discounted_total' => $faker->randomFloat(),
        'total' => $faker->randomFloat(),
    ];
});
