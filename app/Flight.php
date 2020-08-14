<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    //
    protected $fillable =
    ['departure_time', 'arrival_time'];
}
