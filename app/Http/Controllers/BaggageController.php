<?php

namespace App\Http\Controllers;

use App\Baggage;
use Illuminate\Http\Request;

class BaggageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.baggages.index', ['baggages' => Baggage::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.baggages.create');
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
                'type' => ['required', 'string', 'unique:baggage', 'max:255'],
                'description' => ['required', 'string', 'min:20', 'max:500']
            ]
        );

        Baggage::create($inputs);
        return redirect()->route('baggages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Baggage  $baggage
     * @return \Illuminate\Http\Response
     */
    public function show(Baggage $baggage)
    {
        //
        return view('admin.baggages.show', ['baggage' => $baggage]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Baggage  $baggage
     * @return \Illuminate\Http\Response
     */
    public function edit(Baggage $baggage)
    {
        //
        return view('admin.baggages.edit', ['baggage' => $baggage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Baggage  $baggage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Baggage $baggage)
    {
        //
        $request->validate(
            [
                'description' => ['required', 'string', 'min:20', 'max:500']
            ]
        );
        $baggage->description = $request['description'];
        if ($baggage->isDirty()) {
            $baggage->save();
        }
        return redirect()->route('baggages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Baggage  $baggage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Baggage $baggage)
    {
        //
    }
}
