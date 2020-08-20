<?php

namespace App\Http\Controllers;

use App\AirlineCompany;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;

class AirlineCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.companies.index', ['companies' => AirlineCompany::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.companies.create', ['countries' => Country::all()]);
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
                'country_id' => ['required', 'integer'],
                'email' => ['required', 'email', 'unique:airline_companies'],
                'phone' => ['required', 'string', 'min:5']
            ]
        );

        AirlineCompany::create($input);

        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AirlineCompany  $airlineCompany
     * @return \Illuminate\Http\Response
     */
    public function show(AirlineCompany $company)
    {
        //
        return view('admin.companies.show', ['company' => $company, 'countries' => Country::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AirlineCompany  $airlineCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(AirlineCompany $company)
    {
        //
        return view('admin.companies.edit', ['company' => $company, 'countries' => Country::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AirlineCompany  $airlineCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AirlineCompany $company)
    {
        //

        $input = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'country_id' => ['required', 'integer'],
                'email' => ['required', 'unique:airline_companies,email,' . $company->id],
                'phone' => ['required', 'string', 'min:5']
            ]
        );
        $company->update($input);
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AirlineCompany  $airlineCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(AirlineCompany $company)
    {
        //
        $company->delete();
        return redirect()->route('companies.index');
    }
}
