<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Destination;
use Faker\Generator as Faker;

$factory->define(Destination::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->city,
        'country_id' => random_int(1, 100),
        'description' => 'dummy data'
    ];
});
