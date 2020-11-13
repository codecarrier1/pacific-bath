<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\FinancingOption::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'default_monthly_payment_factor' => $faker->randomFloat(0, 0),
        'default_interest_rate' => $faker->randomFloat(2, 4, 10),
        'number_of_months' => $faker->numberBetween(12, 144),
        'institution' => $faker->company,
        'notes' => $faker->sentence,
    ];
});
