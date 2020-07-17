<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Transaction;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomDigit,
        'trx_num' => Str::random(12),
        'trx_type' => $faker->boolean,
        'amount' => $faker->randomFloat(2, 0, 1),
        'remaining_balance' => $faker->randomFloat(2, 0, 1),
        'interest' => $faker->boolean,
        'details' => $faker->word,
    ];
});
