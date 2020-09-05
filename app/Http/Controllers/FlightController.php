<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Destination;
use App\Flight;
use App\User;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (!Auth::check()) {
            return view('flights.index', ['flights' => Flight::all()->random(), 'destinations' => Destination::all()]);
        } else if (auth()->user()->hasRole('admin')) {
            return view('admin.flights.index', ['flights' => Flight::paginate(20), 'destinations' => Destination::all()]);
        } else {
            return view('flights.index', ['flights' => Flight::all()->random(), 'destinations' => Destination::all()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        //
        return view('flights.show', ['flight' => $flight]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        //
        return view('admin.flights.edit', ['flight' => $flight]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {
        //
        $inputs = $request->validate(
            [
                'departure_airport_id' => ['required', 'integer'],
                'arrival_airport_id' => ['required', 'integer'],
                'departure_time' => ['required', 'date'],
                'arrival_time' => ['required', 'date'],
                'gate' => ['required', 'integer'],
                'airplane_id' => ['required', 'integer'],
                'airline_company_id' => ['required', 'integer'],
                'min_price' => ['required', 'numeric']
            ]
        );

        $flight->update($inputs);
        session()->flash('message', 'The flight is updated!!!');
        return back();
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        //
    }

    public function search(Request $request)
    {
        //dd($request->all());
        $dest1 = Destination::where('name', $request['destination1'])->first();
        $airports1 = Airport::select('id')->where('destination_id', $dest1->id)->get()->toArray();
        if ($request['destination2'] != null) {
            $dest2 = Destination::where('name', $request['destination2'])->first();
            $airports2 = Airport::select('id')->where('destination_id', $dest2->id)->get()->toArray();
            if ($request['date1'] != null) {
                $flights = Flight::whereRaw('DATE(`departure_time`)=?', $request['date1'])->whereIn('departure_airport_id', $airports1)->whereIn('arrival_airport_id', $airports2)->get();
            } else {
                $flights = Flight::whereIn('departure_airport_id', $airports1)->whereIn('arrival_airport_id', $airports2)->get();
            }
        } else {
            if ($request['date1'] != null) {
                $flights = Flight::whereRaw('DATE(`departure_time`)=?', $request['date1'])->whereIn('departure_airport_id', $airports1)->get();
            } else {
                $flights = Flight::whereIn('departure_airport_id', $airports1)->get();
            }
        }
        return view('booking.index', ['flights' => $flights, 'person' => $request['person']]);
        // dd(Date($request['date1']));


        // $flights = Flight::whereRaw('DATE(`departure_time`)=? AND `departure_airport_id`=? , $request['date1'],57)->get();

        dd($flights);
    }

    public function explore(Request $request)
    {
        // $d = Destination::where('name', $request['destination1'])->first();
        $aiports = Airport::select('id')->where('destination_id', $request['destination1'])->get();
        if ($request['date'] != null) {
            //viidi da li moze findOrFail sa name ili samo id 
            // dd(Carbon::parse($request['date'])->format('Y-m-d'));
            $params = array('destination1' => $request['destination1'], 'date' => $request['date']);
            $result = Flight::whereIn('departure_airport_id', $aiports)->whereRaw('DATE(`departure_time`)=?', $request['date'])->paginate(10)->appends($params);
            return view('explore', ['result' => $result, 'destination1' => $request['destination1'], 'date' => $request['date']]);
        } else {
            $result = Flight::whereIn('departure_airport_id', $aiports)->paginate(10)->appends('destination1', $request['destination1']);
            return view('explore', ['result' => $result, 'destination1' => $request['destination1']]);
        }
    }

    public function filter(Request $request)
    {

        // $d = Destination::where('name', $request['destination1'])->first();
        // $aiports = Airport::select('id')->where('destination_id', $d->id)->get();
        // if ($request['date'] != null) {
        //     //viidi da li moze findOrFail sa name ili samo id 
        //     $result = Flight::whereIn('departure_airport_id', $aiports)->whereRaw('DATE(`departure_time`)=?', $request['date'])->get();
        //     return view('explore', ['result' => $result]);
        // } else {
        //     $result = Flight::whereIn('departure_airport_id', $aiports)->paginate(10);
        // }

        // $d = Destination::where('name', $request['destination1'])->first();


        // $aiports = Airport::select('id')->where('destination_id', $request['destination1'])->get();
        // return  $request->all();

        $result = Flight::all();

        return $result;
    }
}
