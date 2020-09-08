<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    //
    protected $fillable = [
        'model', 'manufacture_id', 'seats', 'capacity'
    ];

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
