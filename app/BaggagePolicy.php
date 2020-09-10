<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaggagePolicy extends Model
{
    //

    protected $fillable = [
        'baggage_id', 'airline_company_id', 'price'
    ];
    public function baggage()
    {
        return $this->belongsTo(Baggage::class);
    }

    public function company()
    {
        return $this->belongsTo(AirlineCompany::class, 'airline_company_id');
    }
}
