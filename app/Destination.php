<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    //

    protected $fillable = [
        'name', 'country_id', 'description'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function airports()
    {
        return $this->hasMany(Airport::class);
    }
}
