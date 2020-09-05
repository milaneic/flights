<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AirlineCompany;
use Faker\Generator as Faker;

$factory->define(AirlineCompany::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->unique()->randomElement(['AirSerbia', 'Lufthansa', 'Wizz', 'Rayan Air']),
        'country_id' => random_int(1, 240),
        'email' => $faker->email,
        'phone' => $faker->phoneNumber

    ];
});
