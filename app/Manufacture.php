<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    //

    protected $fillable = [
        'name', 'country_id'
    ];

    public function airplanes()
    {
        return $this->hasMany(Airplane::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
