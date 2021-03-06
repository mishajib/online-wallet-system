<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->phoneNumber,
        'address' => $faker->address,
        'balance' => $faker->randomFloat(8, 0, 200),
        'city' => $faker->city,
        'postcode' => $faker->postcode,
        'ref_by' => $faker->numberBetween(1, 60),
        'slug' => $faker->slug,
        'email_verified_at' => now(),
        'status' => $faker->boolean,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
