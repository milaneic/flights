<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baggage extends Model
{
    //

    protected $fillable = [
        'type', 'description'
    ];
}
