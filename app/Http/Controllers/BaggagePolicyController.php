<?php

namespace App\Http\Controllers;

use App\BaggagePolicy;
use App\AirlineCompany;
use Illuminate\Http\Request;

class BaggagePolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\BaggagePolicy  $baggagePolicy
     * @return \Illuminate\Http\Response
     */
    public function show(BaggagePolicy $baggagePolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BaggagePolicy  $baggagePolicy
     * @return \Illuminate\Http\Response
     */
    public function edit($baggage_id, $airline_company_id)
    {
        //   
        $policy = BaggagePolicy::where('baggage_id', $baggage_id)->where('airline_company_id', $airline_company_id)->first();

        return view('admin.policies.edit', ['policy' => $policy, 'baggage_id' => $baggage_id, 'airline_company_id' => $airline_company_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BaggagePolicy  $baggagePolicy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $baggage_id, $airline_company_id)
    {
        //
        $inputs = $request->validate([
            'baggage_id' => ['required', 'integer', 'digits:1'],
            'airline_company_id' => ['required', 'integer', 'digits:1'],
            'price' => ['required', 'gt:10', 'regex:/^\d*(\.\d{2})?$/']
        ]);
        //$policy = BaggagePolicy::where('baggage_id', $request['baggage_id'])->where('airline_company_id', $request['airline_company_id'])->first();
        $company = AirlineCompany::findOrFail($airline_company_id);
        $policy = $company->baggage_policies()->where('baggage_id', $baggage_id)->update(['price' => $request['price']]);
        session()->flash('message', 'Policy price has been successfuly updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BaggagePolicy  $baggagePolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaggagePolicy $baggagePolicy)
    {
        //
    }
}
