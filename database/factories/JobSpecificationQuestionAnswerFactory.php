<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\JobSpecificationQuestionAnswer::class, function (Faker $faker) {
    return [
        'js_question_id' => function () {
            return factory(App\JobSpecificationQuestion::class)->create()->id;
        },
        'lead_id' =>  function () {
            return factory(App\Lead::class)->create()->id;
        },
        'answer' => $faker->word,
        'comment' => $faker->text,
    ];
});
