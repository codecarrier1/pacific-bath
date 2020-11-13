<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\SalesDocument;
use App\Service;
use App\VeteranDiscount;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
    ];
});

/**
 * After creating a service, assign it various relationships
 */
$factory->afterCreating(Service::class, function (Service $service, Faker $faker) {
    // Generate a veteran discount for this specific service
    $veteranDiscount = factory(VeteranDiscount::class)->make([
        'name' => 'Veteran Discount - '.$service->name,
    ]);

    // Attach
    $service->veteranDiscounts()
        ->save($veteranDiscount);

    // Generate sales documents for this service
    $salesDocuments = SalesDocument::all();

    $salesDocuments->each(function(SalesDocument $document) use ($service) {
        // Attach
        $service->salesDocuments()
            ->save($document);
    });
});
