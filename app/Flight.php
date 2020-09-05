<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    //
    protected $fillable =
    ['departure_time', 'arrival_time', 'gate', 'airplane_id', 'departure_airport_id', 'arrival_airport_id', 'min_price', 'airline_company_id'];


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function airport_from()
    {
        return $this->hasOne(Airport::class, 'id', 'departure_airport_id');
    }

    public function airport_to()
    {
        return $this->hasOne(Airport::class, 'id', 'arrival_airport_id');
    }

    public function destination_from()
    {
        return $this->airport_from->destination();
    }

    public function destination_to()
    {
        return $this->airport_to->destination();
    }

    public function airline_company()
    {
        return $this->belongsTo(AirlineCompany::class);
    }

    public function airplane()
    {
        return $this->belongsTo(Airplane::class);
    }
}
