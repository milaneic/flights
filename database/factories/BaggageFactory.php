<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Baggage;
use Faker\Generator as Faker;

$factory->define(Baggage::class, function (Faker $faker) {
    return [
        //
        'type' => $faker->unique()->randomElement(['Free handed luggage', 'Trolley bag', 'Small check-in', 'Medium check-in', 'Big check-in']),
        'description' => 'add description for this bag'
    ];
});
