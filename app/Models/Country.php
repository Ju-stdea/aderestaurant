<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name', 'iso3', 'numeric_code', 'iso2', 'phonecode',
        'capital', 'currency', 'currency_name', 'currency_symbol',
        'tld', 'native', 'region', 'region_id', 'subregion',
        'subregion_id', 'nationality', 'timezones', 'translations',
        'latitude', 'longitude', 'emoji', 'emojiU', 'flag', 'wikiDataId'
    ];

    // Define the relationship with states
    public function states()
    {
        return $this->hasMany(State::class);
    }

    // Define the relationship with regions
    public function regions()
    {
        return $this->hasMany(Region::class, 'region_id');
    }

    // Define the relationship with subregions
    public function subregions()
    {
        return $this->hasMany(Subregion::class, 'subregion_id');
    }
}
