<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subregion extends Model
{
    protected $fillable = [
        'name', 'translations', 'region_id', 'flag', 'wikiDataId'
    ];

    // Define the relationship with region
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    // Define the relationship with countries
    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }
}
