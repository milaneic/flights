<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Country;
use Facade\FlareClient\Stacktrace\File;
use Faker\Generator as Faker;
use PHPUnit\Util\Json;

$factory->define(Country::class, function (Faker $faker) {

    return [];
});
