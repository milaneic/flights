<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable = [];

    public function booked()
    {
        return $this->belongsTo(Booking::class);
    }
}
