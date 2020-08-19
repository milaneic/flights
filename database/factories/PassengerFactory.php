<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Passenger;
use Faker\Generator as Faker;
use Faker\Provider\ar_SA\Person;

$factory->define(Passenger::class, function (Faker $faker) {
    return [
        //
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'gender' => $faker->randomElement(['male', 'female']),
        'document_type' => $faker->randomElement(['card', 'passport']),
        'document_number' => $faker->numerify('##########')

    ];
});
