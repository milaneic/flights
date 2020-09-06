<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaggageBooking extends Model
{
    //
    protected $fillable = [
        'booking_id', 'baggage_id', 'quantity'
    ];
}
