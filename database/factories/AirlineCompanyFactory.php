<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AirlineCompany;
use Faker\Generator as Faker;

$factory->define(AirlineCompany::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->unique()->randomElement(['AirSerbia', 'LuftHansa', 'Wizz', 'Rayan Air']),
        'country_id' => random_int(1, 100),
        'email' => $faker->email,
        'phone' => $faker->phoneNumber

    ];
});
