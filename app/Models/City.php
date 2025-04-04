<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name', 'state_id', 'state_code', 'country_id', 'country_code',
        'latitude', 'longitude', 'flag', 'wikiDataId'
    ];

    // Define the relationship with state
    public function state()
    {
        return $this->belongsTo(State::class);
    }

}
