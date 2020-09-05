<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //

    protected $fillable = [
        'user_id', 'flight_id', 'amount', 'is_confirmed'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function destination_from()
    {
        return $this->flight()->destination_from();
    }

    public function destination_to()
    {
        return $this->flight()->destination_to();
    }
}
