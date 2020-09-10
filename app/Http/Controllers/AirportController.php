<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Destination;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.airports.index', ['airports' => Airport::paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.airports.create', ['destinations' => Destination::all()]);
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
        $input = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'destination_id' => ['required', 'integer'],
                'ident' => ['required', 'string', 'max:4', 'unique:airports,ident']
            ]
        );
        Airport::create($input);
        return redirect()->route('airports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function show(Airport $airport)
    {
        //
        return view('admin.airports.show', ['airport' => $airport, 'destinations' => Destination::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function edit(Airport $airport)
    {
        //
        return view('admin.airports.edit', ['airport' => $airport, 'destinations' => Destination::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airport $airport)
    {

        $input = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'destination_id' => ['required', 'integer'],
                'ident' => ['required', 'string', 'max:4', 'unique:airports,ident']
            ]
        );
        $airport->update($input);
        session()->flash('message', 'Airport is updated!');
        return redirect()->route('manufactures.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airport $airport)
    {
        //
        $airport->delete();
        return redirect()->route('airports.index');
    }
}
