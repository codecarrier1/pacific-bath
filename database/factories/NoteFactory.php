<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

/*
 * This function expects an array with weights
 * as its array indices. You should not use a
 * simple array — e.g. array('a', 'b', 'c'). Since
 * the first item in an array like this has index 0,
 * it will never be selected.
 *
 * It will return a randomly selected value.
 * @credit http://justinhileman.info/article/wrand-a-php-weighted-randomization-function/
 */
if (! function_exists('wrand')) {
    function wrand($data)
    {
        $totalw = array_sum(array_keys($data));
        $rand = rand(1, $totalw);

        $curw = 0;
        foreach ($data as $i => $val) {
            $curw += $i;
            if ($curw >= $rand) {
                return $val;
            }
        }

        return end($data);
    }
}

$factory->define(App\Note::class, function (Faker $faker) {
    $lead = App\Lead::inRandomOrder()->first();
    $choices = [90 => $lead->user(), 10 => App\User::inRandomOrder()];
    $user = wrand($choices)->first();

    return [
        'content' => $faker->text,
        'user_id' => $user->id,
        'lead_id' => $lead->id,
    ];
});
