<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    //

    protected $fillable = [
        'destination_id', 'name', 'ident',
    ];


    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
