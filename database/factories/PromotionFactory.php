<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promotion;
use App\Service;
use Faker\Generator as Faker;

$factory->define(Promotion::class, function (Faker $faker) {
    $names = [
        'Fall Savings Event',
        'Summer Sales Event',
        'Year End Promo',
        'Overstock Clearance',
        'Sales Event',
    ];

    $types = [
        'Online Advertisement',
        'Direct Mail',
    ];

    return [
        'name' => $faker->randomElement($names),
        'type' => $faker->randomElement($types),
        'discount_type' => $faker->randomElement(Promotion::DISCOUNT_TYPES),
        'discount' => function(array $promotion) use ($faker){
            if($promotion['discount_type'] === Promotion::DOLLAR_AMOUNT){
                return $faker->randomNumber($digits = 4);
            }
            return $faker->randomFloat($decimals = 2, $min = 1.00, $max = 20);
        },
        'max_value' => function(array $promotion) use ($faker){
            if($promotion['discount_type'] === Promotion::DOLLAR_AMOUNT){
                return $promotion['discount'];
            }
            return $faker->randomNumber($digits = 4);
        },
        'begins_on' => now()->firstOfMonth(),
        'ends_on' => now()->endOfMonth(),
    ];
});

/**
 * After creating a service, assign it various relationships
 */
$factory->afterCreating(Promotion::class, function (Promotion $myModel, Faker $faker) {
    // Pick random services to apply the promotion
    $serviceIds = Service::inRandomOrder()
        ->limit($faker->numberBetween($min = 1, $max = 3))
        ->get('id');

    // Attach it
    $myModel->services()
        ->sync($serviceIds);
});
