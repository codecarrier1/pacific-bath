<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Lead::class, function (Faker $faker) {
    return [
        'salesforce_appointment_id' => \Illuminate\Support\Str::random(),
        'salesforce_prospect_id' => \Illuminate\Support\Str::random(),
        'email' => $faker->companyEmail,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'address' => $faker->streetAddress,
        'address_2' => null,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip' => $faker->postcode,
        'amount' => random_int(8000, 60000),
        'appointment_time' => $faker->dateTimeBetween('-30 day', '+14 day'),
        'sales_disposition_id' => function () {
            return factory(App\SalesDisposition::class)->create()->id;
        },
        'service_id' => function () {
            return factory(\App\Service::class)->create()->id;
        },
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'is_acknowledged' => function (array $lead) {
            if ($lead['sales_disposition_id'] === \App\SalesDisposition::NEW) {
                return false;
            }

            return true;
        },

    ];
});

$factory->state(App\Lead::class, 'sold', function () {
    return [
     'sales_disposition_id' => \App\SalesDisposition::SALES,
     'processor_status_id' => \App\ProcessorStatus::inRandomOrder()->first(),
     'processor_id' => \App\User::role('Processor')->inRandomOrder()->first()->id,
     'installation_status_id' => \App\InstallationStatus::inRandomOrder()->first()->id,
       'is_acknowledged' => true,
   ];
});

$factory->state(App\Lead::class, 'today', function(Faker $faker){
   return [
       'appointment_time' => Carbon::today('PST')->addHours(random_int(8, 15)),
   ] ;
});
