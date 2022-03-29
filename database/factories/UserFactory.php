<?php

/** @var Factory $factory */

use App\Models\User;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
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
        'first_name'        => $faker->firstName,
        'surname'           => $faker->lastName,
        'barcode'           => $faker->randomNumber(),
        'country_code'      => '+971',
        'phone'             => $faker->phoneNumber,
        'email'             => $faker->unique()->safeEmail,
        'hash'              => User::generateToken(), // password
        'created_at'        => Carbon::now()->subDays(rand(1, 20))
    ];
});
