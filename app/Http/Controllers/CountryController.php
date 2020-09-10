<?php

namespace App\Http\Controllers;

use App\Country;
use App\Destination;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.countries.index', ['countries' => Country::paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.countries.create');
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
        $inputs = $request->validate(
            [
                'name' => ['required', 'unique:countries', 'string', 'max:255'],
                'country_code' => ['required', 'unique:countries', 'string', 'max:2']
            ]
        );

        Country::create($inputs);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
        return view('admin.countries.show', ['country' => $country, 'destinations' => Destination::where('country_id', $country->id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
        return view('admin.countries.edit', ['country' => $country, 'destinations' => Destination::where('country_id', $country->id)->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
        $inputs = $request->validate(
            [
                'name' => ['required', 'unique:countries,name,' . $country->id, 'string', 'max:255'],
                'country_code' => ['required', 'unique:countries,country_code,' . $country->id, 'string', 'max:2']
            ]
        );
        $country->update($inputs);
        session()->flash('message', 'Country has been successfuly updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
        $country->delete();
        return redirect()->route('countries.index');
    }
}
