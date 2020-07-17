<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Log;
use Faker\Generator as Faker;

$factory->define(Log::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomDigit,
        'ip' => $faker->ipv4,
        'machine_name' => $faker->name,
    ];
});
