<?php

namespace App\Http\Controllers;

use App\Country;
use App\Destination;
use App\Image;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.destinations.index', ['destinations' => Destination::paginate(20)]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.destinations.create');
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
        // dd($request->all());
        $inputs = $request->validate([
            'name' => ['required', 'string'],
            'country_id' => ['required', 'integer'],
            'description' => ['required', 'min:100'],
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $d = Destination::create($inputs);
        // dd($request->all());
        $files = $request->file('file');
        foreach ($files as $file) {
            $img = $file->store('images/destinations', 'public');
            $d->images()->create(
                ['url' => $img]
            );
        }
        // if ($request['image']) {
        //     $d->images()->create(['url' => $request['image']]);
        // }

        return redirect()->route('destinations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {
        //
        return view('admin.destinations.show', ['destination' => $destination]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        //
        return view('admin.destinations.edit', ['destination' => $destination, 'countries' => Country::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {
        $inputs = $request->validate([
            'name' => ['required', 'string'],
            'country_id' => ['required', 'integer'],
            'description' => ['required', 'min:100'],
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $destination->update($inputs);
        if ($request->has('images')) {
            if (count($destination->images) > 0) {
                $destination->images()->delete();
            }
            // dd($request->all());
            $files = $request->file('file');
            foreach ($files as $file) {
                $img = $file->store('images/destinations', 'public');
                $destination->images()->create(
                    ['url' => $img]
                );
            }
        }

        session()->flash('message', 'Destination has been sucessfuly updated!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        //
    }
}
