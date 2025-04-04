<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Store extends Model
{

    protected $fillable = [
        'name', 'address', 'city', 'country', 'state', 'postal_code', 'distance', 'warehouse', 'is_free'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
