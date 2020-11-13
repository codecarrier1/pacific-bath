<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\DispositionReport::class, function (Faker $faker) {
    return [
        'lead_id' =>  function () {
            return factory(App\Lead::class)->create()->id;
        },
        'user_id' =>  function () {
            return factory(App\User::class)->state('salesRep')->create()->id;
        },
        'appointment_time' => $faker->dateTime(),
        'service_name' => $faker->word,
        'attendees' => $faker->word,
        'age' => $faker->word,
        'disposition_status' => $faker->word,
        'sale_amount' => $faker->randomFloat(),
        'notes' => $faker->text,
    ];
});
