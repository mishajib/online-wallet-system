<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Interest;
use Faker\Generator as Faker;

$factory->define(Interest::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'percent' => $faker->numberBetween(0, 10),
    ];
});
