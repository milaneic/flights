<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirlineCompany extends Model
{
    //

    protected $fillable = [
        'country_id', 'name', 'phone', 'email',
    ];

    public function flights()
    {
        return $this->hasOneOrMany(Flight::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function baggage_policies()
    {
        return $this->hasMany(BaggagePolicy::class);
    }
}
