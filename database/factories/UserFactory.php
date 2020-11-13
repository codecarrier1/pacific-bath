<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\FactoryBuilder;

FactoryBuilder::macro('disableEvents', function () {
    $this->class::flushEventListeners();

    return $this;
});

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'location_id' => function () {
            return factory(App\Location::class)->create()->id;
        },
    ];
});

$factory->state(App\User::class, 'admin', []);

$factory->state(App\User::class, 'directorOfSales', []);

$factory->state(App\User::class, 'salesRep',  function (Faker $faker) {
    return [
      'salesforce_id' => $faker->uuid,
    ];
});

$factory->state(App\User::class, 'directorOfOps', []);

$factory->state(App\User::class, 'processor', []);

$factory->state(App\User::class, 'installManager', []);

$factory->afterCreatingState(App\User::class, 'admin', function (User $user, $faker) {
    $user->assignRole('Administrator');
});
$factory->afterCreatingState(App\User::class, 'salesRep', function (User $user, $faker) {
    $user->assignRole('Sales Representative');
});
$factory->afterCreatingState(App\User::class, 'processor', function (User $user, $faker) {
    $user->assignRole('Processor');
});

$factory->afterCreatingState(App\User::class, 'directorOfSales', function (User $user, $faker) {
    $user->assignRole('Director of Sales');
    $user->location->director_of_sales_id = $user->id;
    $user->location->save();
});

$factory->afterCreatingState(App\User::class, 'directorOfOps', function (User $user, $faker) {
    $user->assignRole('Director of Operations');
    $user->location->director_of_ops_id = $user->id;
    $user->location->save();
});

$factory->afterCreatingState(App\User::class, 'installManager', function (User $user, $faker) {
    $user->assignRole('Installation Manager');
    $user->location->installation_manager_id = $user->id;
    $user->location->save();
});
