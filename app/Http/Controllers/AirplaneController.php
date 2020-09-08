<?php

namespace App\Http\Controllers;

use App\Airplane;
use App\Manufacture;
use Illuminate\Http\Request;

class AirplaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $airplanes = Airplane::orderBy('manufacture_id')->get();
        return view('admin.airplanes.index', ['airplanes' => $airplanes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.airplanes.create', ['manufactures' => Manufacture::all()]);
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
                'model' => 'required',
                'capacity' => 'required',
                'manufacture_id' => 'required'
            ]
        );

        Airplane::create($input);
        return redirect()->route('airplanes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function show(Airplane $airplane)
    {
        //
        return view('admin.airplanes.show', ['airplane' => $airplane, 'manufactures' => Manufacture::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function edit(Airplane $airplane)
    {
        //
        return view('admin.airplanes.edit', ['airplane' => $airplane, 'manufactures' => Manufacture::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airplane $airplane)
    {
        //
        $input = $request->validate(
            [
                'model' => 'required|min:3',
                'capacity' => 'required',
                'manufacture_id' => 'required'
            ]
        );

        $airplane->update($input);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airplane $airplane)
    {
        //
        $airplane->delete();
        return redirect()->route('airplanes.index');
    }
}
