<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SalesDocumentSigner;
use Faker\Generator as Faker;

$factory->define(SalesDocumentSigner::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'quote_id' => factory(\App\Quote::class),
        'sales_document_id' => factory(\App\SalesDocument::class),
        'on_behalf_of_name' => $faker->word,
        'on_behalf_of_email' => $faker->word,
        'is_signed' => $faker->boolean,
    ];
});
