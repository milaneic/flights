<?php

use App\Airplane;
use App\Booking;
use App\Country;
use App\Flight;
use App\Manufacture;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Count;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/planes', function () {
    $planes = Airplane::all();

    return view('planes', ['planes' => $planes]);
});

Route::get('/flights', function () {
    $flights = Flight::all();

    return view('flights', ['flights' => $flights]);
});

Route::get('/country', function () {
    $country = Country::all();

    return view('country', ['country' => $country]);
});


Route::get('/manufacture', function () {
    $manufacture = Manufacture::all();

    return view('manufacture', ['manufacture' => $manufacture]);
});


Route::get('/booking', function () {
    $booking = Booking::all();

    return view('booking', ['booking' => $booking]);
});
