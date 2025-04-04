<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Shipment extends Model
{
    use HasFactory;

    protected $table = 'shipments';

    protected $keyType = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'order_id',
        'shipment_identification',
        'tracking_number',
        'transaction_reference',
        'total_charges',
        'transportation_charges',
        'base_service_charge',
        'itemized_charges',
        'currency_code',
        'billing_weight',
        'weight_unit',
        'shipping_label_base64',
    ];

    // Define a relationship to the Order model
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($shipment) {
            $shipment->{$shipment->getKeyName()} = (string) Str::uuid();
        });
    }
}
