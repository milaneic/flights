<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booking;
use App\Flight;
use App\Passenger;
use App\Ticket;
use Faker\Generator as Faker;
use Carbon\Carbon;


$factory->define(Flight::class, function (Faker $faker) {



    return [];
    // return [
    //     //
    //     'departure_time' => Carbon::today(),
    //     'arrival_time' => Carbon::today()->addHours(2),
    //     'departure_airport_id' => random_int(1, 100),
    //     'arrival_airport_id' => random_int(1, 100),
    //     'gate' => random_int(1, 20),
    //     'airplane_id' => random_int(1, 4),
    //     'airline_company_id' => random_int(1, 4),
    //     'min_price' => random_int(100, 200),
    // ];
    // });
});
