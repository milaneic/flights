<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Airplane;
use Faker\Generator as Faker;

$factory->define(Airplane::class, function (Faker $faker) {
    return [
        //
        'manufacture_id' => random_int(1, 2),
        'model' => $faker->unique()->randomElement(['A320', 'A330', 'A320neo', '737', '777', '378']),
        'seats' => 'matrica',
        'capacity' => $faker->randomElement([200, 300, 160, 180])
    ];
});
