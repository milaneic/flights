<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaggagePolicy extends Model
{
    //

    public function baggage()
    {
        return $this->belongsTo(Baggage::class);
    }
}
