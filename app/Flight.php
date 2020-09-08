<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    //
    protected $fillable =
    [
        'departure_time', 'arrival_time', 'gate', 'airplane_id', 'departure_airport_id', 'arrival_airport_id', 'min_price', 'airline_company_id', 'available_seats', 'seats_capacity', 'seats_map'
    ];


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

    public function updatePrice()
    {
        $flight = $this;
        $total_seats = $flight->seats_capacity;
        $seats_left = $flight->available_seats;



        $procentage_free_seats = ($seats_left / $total_seats) * 100;
        switch ($procentage_free_seats) {
            case $procentage_free_seats < 80 && $procentage_free_seats > 60:
                $flight->min_price *= 1.2;
                break;
            case $procentage_free_seats < 60 && $procentage_free_seats > 50:
                $flight->min_price *= 1.4;
                break;
            case $procentage_free_seats < 50 && $procentage_free_seats > 30:
                $flight->min_price *= 1.6;
                break;
            case $procentage_free_seats < 50 && $procentage_free_seats > 30:
                $flight->min_price *= 1.6;
                break;
            case $procentage_free_seats < 30 && $procentage_free_seats > 20:
                $flight->min_price *= 2;
                break;
            case $procentage_free_seats < 20:
                $flight->min_price *= 3;
                break;
            default:
                break;
                $flight->save();
        }
    }
}
