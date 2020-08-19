<?php

use App\Airplane;
use App\Booking;
use App\Country;
use App\Flight;
use App\User;
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

Route::group(['middleware' => 'web'], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    //Routes for airplanes
    // Route::get('/airplanes', 'AirplaneController@index')->name('airplanes');


    Route::get('/user', function () {
        return view('user');
    })->middleware('web', 'auth');

    Route::get('/airplanes/{airplane}', 'AirplaneController@show')->name('airplanes.show');
    Route::resource('admin/airplanes', 'AirplaneController', ['middleware' => ['web', 'auth', 'role:admin']]);
});
