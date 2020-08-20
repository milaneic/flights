<?php

namespace App\Http\Controllers;

use App\Country;
use App\Manufacture;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.manufacture.index', ['manufactures' => Manufacture::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.manufacture.create', ['countries' => Country::all()]);
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
        $input = $request->validate([
            'name' => 'required',
            'country_id' => 'required'
        ]);

        Manufacture::create($input);
        return redirect()->route('manufactures.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacture $manufacture)
    {
        //
        return view('admin.manufacture.show', ['manufacture' => $manufacture]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacture $manufacture)
    {
        //
        return view('admin.manufacture.edit', ['manufacture' => $manufacture, 'countries' => Country::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacture $manufacture)
    {
        //
        $input = $request->validate(
            [
                'name' => 'required|min:3',
                'country_id' => 'required'
            ]

        );

        $manufacture->update($input);
        return redirect()->route('manufactures.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacture $manufacture)
    {
        //
        $manufacture->delete();
        return redirect()->route('manufactures.index');
    }
}
