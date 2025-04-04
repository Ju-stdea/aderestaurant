<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Customer extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'customers';

    protected $keyType = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'password',
        'country',
        'state',
        'city',
        'address',
        'zipcode',
        'mobile',
        'terms_agreed',
        'is_shipping'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($customer) {
            $customer->{$customer->getKeyName()} = (string) Str::uuid();
        });
    }

    public function deliveryAddresses()
    {
        return $this->hasMany(DeliveryAddress::class, 'user_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

}
