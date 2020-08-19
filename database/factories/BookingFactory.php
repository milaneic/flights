<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booking;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    return [
        //
        'user_id' => random_int(1, 100),
        'flight_id' => random_int(1, 100),
        'amount' => $faker->randomElement([100, 200, 300])
    ];
});
