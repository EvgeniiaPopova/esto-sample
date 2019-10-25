<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Transaction::class, function (Faker $faker) {
    $type = \App\Transaction::TRANSACTION_TYPES;
    return [
        'amount' => $faker->randomFloat(2, 1, 9999),
        'type' => array_rand($type),
        'user_id' => auth()->check() ? auth()->user()->id : \App\User::all()->random()->id,
    ];
});
