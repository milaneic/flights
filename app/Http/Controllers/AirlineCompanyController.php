<?php

namespace App\Http\Controllers;

use App\AirlineCompany;
use App\BaggagePolicy;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

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
        //dd($request['bags'][0]);
        $input = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'country_id' => ['required', 'integer'],
                'email' => ['required', 'email', 'unique:airline_companies'],
                'phone' => ['required', 'string', 'gt:5'],
                'bags.*' => ['required', 'gt:10', 'regex:/^\d*(\.\d{2})?$/']
            ]
        );
        $company = AirlineCompany::create($input);
        DB::table('baggage_policies')->insert(['baggage_id' => 1, 'airline_company_id' => $company->id, 'price' => 0]);
        for ($i = 2; $i < 6; $i++) {
            DB::table('baggage_policies')->insert(['baggage_id' => $i, 'airline_company_id' => $company->id, 'price' => $request['bags'][$i - 2]]);
        }
        session()->flash('message', 'Airline company has been successfuly created');
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
        //dd($request->all());
        $input = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'country_id' => ['required', 'integer'],
                'email' => ['required', 'unique:airline_companies,email,' . $company->id],
                'phone' => ['required', 'string', 'gt:5'],
                'bags.*' => ['required', 'gt:2', 'regex:/^\d*(\.\d{2})?$/']
            ]
        );
        $bags = $request['bags'];
        for ($i = 2; $i < 6; $i++) {
            $policy = $company->baggage_policies()->where('baggage_id', $i)->first();
            $price_from_input = $bags[$i - 2];
            if ($policy->price != $price_from_input) {
                $company->baggage_policies()->where('baggage_id', $i)->update(['price' => $price_from_input]);
            }
        }
        $company->update($input);
        session()->flash('message', 'Airline company is successfuly updated');
        return redirect()->back();
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
