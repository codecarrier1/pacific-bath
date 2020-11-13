<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Measurement::class, function (Faker $faker) {
    return [
        'lead_id' => function () {
            return factory(App\Lead::class)->create()->id;
        },
    ];
});

$factory->state(App\Measurement::class, 'complete', function (Faker $faker) {
    return [
        'opening_width' => $faker->randomFloat(2, 20, 120),
        'tub_width' => $faker->randomFloat(2, 20, 120),
        'right_side_wall' => $faker->randomFloat(2, 70, 120),
        'right_surround_width' => $faker->randomFloat(2, 70, 120),
        'room_height' => $faker->randomFloat(2, 70, 120),
        'left_side_wall' => $faker->randomFloat(2, 70, 120),
        'left_surround_width' => $faker->randomFloat(2, 70, 120),
        'ceiling_panel' => $faker->randomFloat(2, 80, 150),
        'soffit' => $faker->randomFloat(2, 20, 50),
        'pan_width' => $faker->randomFloat(2, 20, 120),
        'pan_height' => $faker->randomFloat(2, 5, 20),
        'lead_id' => function () {
            return factory(App\Lead::class)->create()->id;
        },
    ];
});
