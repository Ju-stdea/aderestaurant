<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DeliveryAddress extends Model
{
    use HasFactory;

    protected $table = 'delivery_addresses';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'user_id',
        'address_line',
        'country',
        'state',
        'city',
        'zipcode',
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($address) {
            if (empty($address->id)) {
                $address->id = (string) Str::uuid();
            }
        });
    }
    
}
