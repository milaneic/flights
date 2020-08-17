<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //

    protected $fillable = [
        'user_id', 'flight_id', 'amount'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}
