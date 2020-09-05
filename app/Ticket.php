<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mockery\Generator\StringManipulation\Pass\Pass;

class Ticket extends Model
{
    //
    protected $fillable = [
        'booking_id', 'passenger_id', 'seat', 'price'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function passenger()
    {
        return $this->hasOne(Passenger::class, 'id', 'passenger_id');
    }
}
