<?php

use App\Airplane;
use App\Booking;
use App\Country;
use App\Flight;
use App\User;
use App\Manufacture;
use App\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PHPUnit\Framework\Constraint\Count;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

use function GuzzleHttp\json_encode;

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

    Route::get('/', 'FlightController@index');
    Route::get('/explore', function () {
        return view('explore');
    })->name('explore');

    Route::get('/explore/search', 'FlightController@explore')->name('explore.search');
    Route::post('/explore/filter', 'FlightController@filter')->name('explore.filter');

    Auth::routes(['verify' => true]);

    //Routes for airplanes
    Route::get('/airplanes/{airplane}', 'AirplaneController@show')->name('airplanes.show');
    Route::resource('admin/airplanes', 'AirplaneController', ['middleware' => ['web', 'auth', 'role:admin']]);

    //Routes for  manufactures
    Route::get('/manufactures/{manufacture}', 'ManufactureController@show')->name('manufactures.show');
    Route::resource('admin/manufactures', 'ManufactureController', ['middleware' => ['auth', 'role:admin']]);


    //Routes for  airlines companies
    Route::get('/companies/{company}', 'AirlineCompanyController@show')->name('companies.show');
    Route::resource('admin/companies', 'AirlineCompanyController', ['middleware' => ['auth', 'role:admin']]);

    //Routes fro airports
    Route::get('/airports/{airport}', 'AirportController@show')->name('airport.show');
    Route::resource('admin/airports', 'AirportController', ['middleware' => ['auth', 'role:admin']]);

    //Routes for countries
    Route::get('/countries/{country}', 'CountryController@show')->name('countries.show');
    Route::resource('admin/countries', 'CountryController', ['middleware' => ['auth', 'role:admin']]);

    //Routes for destinations
    Route::get('/destinations/{destination}', 'DestinationController@show')->name('destinations.show');
    Route::resource('admin/destinations', 'DestinationController', ['middleware' => ['auth', 'role:admin']]);

    //Routes for baggages
    Route::get('/baggages/{baggage}', 'BaggageController@show')->name('baggages.show');
    Route::resource('admin/baggages', 'BaggageController', ['middleware' => ['auth', 'role:admin']]);

    //Routes for users
    Route::get('/user/{user}', 'UserController@show')->name('user.show')->middleware(['auth', 'can:view,user', 'verified']);
    Route::get('/users/{user}', 'UserController@edit')->name('users.edit')->middleware('can:view,user');
    Route::patch('/users/{user}', 'UserController@update',)->middleware('can:update,user')->name('users.store');
    Route::resource('admin/users', 'UserController')->middleware(['auth', 'role:admin']);

    //Routes for flights
    Route::get('/flight/{flight}', 'FlightController@show')->name('flight.show');
    Route::get('/flights/search', 'FlightController@search')->name('flight.search');
    // Route::get('/admin/flights', 'FlightController@index')->name('flights.index')->middleware(['auth', 'role:admin']);
    Route::resource('/admin/flights', 'FlightController')->middleware(['auth', 'role:admin']);
    //Route for passengers
    Route::resource('/admin/passengers', 'PassengerController')->middleware(['auth', 'role:admin']);
    Route::get('/passenger/{passenger}/edit', 'PassengerController@edit')->name('passenger.edit')->middleware(['auth', 'can:view,passenger']);
    Route::patch('/passenger/{passenger}/edit', 'PassengerController@update')->name('passenger.update')->middleware(['auth', 'can:view,passenger']);


    //Route for passenger where we create passengers tickets and also booking
    Route::get('/booking/create/{flight}/person/{person}', 'BookingController@create')->name('booking.create');
    Route::post('/booking/flight/{flight}/passenger/{passenger}', 'BookingController@store')->name('booking.store');
    Route::get('/booking/{booking}', 'BookingController@show')->name('booking.show')->middleware(['auth', 'can:view,booking']);

    //Route for seat    
    Route::get('/seat', function () {
        return view('seat');
    });


    Route::get('/admin', function () {
        return view('components.admin-master');
    })->name('admin.index')->middleware('auth', 'role:admin');



    Route::get('/json', function () {
        $json = file_get_contents(storage_path('json/countries.json'));
        $objs = json_decode($json, true);
        return sizeof($objs);
        foreach ($objs as $obj) {
            var_dump($obj['code']);
        }
    });

    Route::get('/j', function () {
        $json = file_get_contents(storage_path('json/airports.json'));
        $objs = json_decode($json, true);
        $filtered = array();
        foreach ($objs as $obj) {
            # code...
            if ($obj['type'] == 'large_airport' && !Str::contains($obj['name'], 'Air Base')) {
                $filtered[] = $obj;
            }
        }
        file_put_contents(storage_path('json/airports.json'), json_encode($filtered));
        //return count($filtered);
    });

    Route::get('/c', function () {
        $faker = Faker::create();
        $json = file_get_contents(storage_path('json/countries.json'));
        $json2 = file_get_contents(storage_path('json/airports.json'));
        $objs2 = json_decode($json2, true);
        $objs = json_decode($json, true);
        foreach ($objs as $obj) {
            $country = Country::create([
                'name' => $obj['name'],
                'country_code' => $obj['code']
            ]);
            $brojac = 0;
            foreach ($objs2 as $obj2) {
                if ($obj['code'] == $obj2['iso_country'] && $obj2['municipality'] != null && $obj2['name'] != null && $obj2['ident'] != null) {
                    $brojac++;
                    $destination = App\Destination::create([
                        'name' => $obj2['municipality'],
                        'country_id' => $country->id,
                        'description' => $obj2['municipality'],
                    ]);
                    var_dump($obj2['municipality']);
                    $airport = App\Airport::create([
                        'destination_id' => $destination->id,
                        'name' => $obj2['name'],
                        'ident' => $obj2['ident']

                    ]);
                    $date = Carbon::today();
                    $date2 = Carbon::today();
                    for ($i = 0; $i < 50; $i++) {
                        $date2 = $date->addHours(rand(1, 9));
                        App\Flight::create([
                            'departure_time' => $date,
                            'arrival_time' => $date2->addHours(rand(1, 9)),
                            'departure_airport_id' => $airport->id,
                            'arrival_airport_id' => rand(1, 600),
                            'gate' => rand(1, 24),
                            'airplane_id' => rand(1, 4),
                            'min_price' => 220
                        ]);
                    }
                }
            }
        }
    });


    Route::get('/d', function () {
        $date = Carbon::today();
        foreach (App\Airport::all() as $airport) {
            $date = Carbon::today();
            $r = null;
            for ($i = 0; $i < 50; $i++) {

                if ($date != Carbon::today() && $r != null) {
                    $date->subHours($r);
                }
                $r = rand(1, 9);
                echo $airport->name . "----> " . $date->addMinutes(30) . "  ---------------------->" . $date->addHours($r) . "<br>";
            }
        }
    });

    Route::get('/cf', function () {
        foreach (App\Flight::all() as $f) {
            if ($f->arrival_time === $f->departure_time) {
                $r = rand(1, 9);
                $d = Carbon::parse($f->arrival_time);
                $f->arrival_time = $d->addHours($r);
                $f->save();
            }
        }
    });

    Route::get('/r', function () {
        var_dump(App\Flight::inRandomOrder()->first());
    });

    Route::get('/user', function () {
        dd(auth()->user());
        dd(auth()->user()->roles);
    });

    Route::get('/r', function () {
        foreach (App\Flight::inRandomOrder()->get() as $f) {
            echo $f->id . "<br>";
        }
    });

    Route::get('/cd', function () {
        $faker = Faker::create();
        foreach (App\Destination::all() as $d) {
            echo $d->description . "<br>";
            $d->description = $faker->paragraph(40);
            $d->save();
            echo $d->description . "<br>";
        }
    });

    Route::get('/cu', function () {
        $faker = Faker::create();
        foreach (App\User::all() as $u) {
            if ($u->id != 1001) {
                $u->password = Hash::make('user123');
                $u->save();
            }
        }
    });
});
