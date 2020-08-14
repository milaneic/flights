<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //

    protected $fillable = [
        'name', 'country_code'
    ];

    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }
}
