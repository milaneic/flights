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

    public function airports()
    {
        return $this->destinations()->airports();
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
