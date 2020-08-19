<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Manufacture;
use Faker\Generator as Faker;

$factory->define(Manufacture::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->unique()->randomElement(['AirBus', 'Boing']),
        'country_id' => random_int(1, 100),
    ];
});
