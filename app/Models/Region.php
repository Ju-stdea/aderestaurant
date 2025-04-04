<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'name', 'translations', 'flag', 'wikiDataId'
    ];

    // Define the relationship with countries
    public function countries()
    {
        return $this->hasMany(Country::class);
    }

    // Define the relationship with subregions
    public function subregions()
    {
        return $this->hasMany(Subregion::class);
    }
}
