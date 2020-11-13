<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Quote::class, function () {
    return [
        'lead_id' => function () {
            return factory(App\Lead::class)->create()->id;
        },
        'user_id' => function () {
            return factory(App\User::class)->state('salesRep')->create()->id;
        },
    ];
});
