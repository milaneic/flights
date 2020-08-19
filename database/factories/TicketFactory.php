<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        //
        'seat' => random_int(1, 30) . $faker->randomElement(['A', 'B', 'C', 'D', 'E', 'F'])
    ];
});
