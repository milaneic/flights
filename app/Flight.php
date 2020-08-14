<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    //
    protected $fillable =
    ['departure_time', 'arrival_time', 'gate', 'airplane_id', 'departure_airport_id', 'arrival_airport_id', 'min_price'];


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function destination_from()
    {
        return $this->hasOne(Destination::class);
    }

    public function destination_to()
    {
        return $this->hasOne(Destination::class);
    }
}
