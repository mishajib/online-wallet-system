<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bonus;
use Faker\Generator as Faker;

$factory->define(Bonus::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomDigit,
        'refer_bonus' => $faker->randomFloat(2, 0, 1),
        'transfer_bonus' => $faker->randomFloat(2, 0, 1),
        'detail' => $faker->word,
    ];
});
