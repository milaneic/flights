<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    //

    protected $fillable = [
        'name', 'manufacture_id',
    ];

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class);
    }
}
