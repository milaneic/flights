<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirlineCompany extends Model
{
    //

    protected $fillable = [
        'country_id', 'name', 'phone', 'email',
    ];
}
