<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    //
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'document_type', 'document_number'
    ];

    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }

    public function flight()
    {
        return $this->ticket->booking->flight;
    }
}
