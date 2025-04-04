<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class OrdersProduct extends Model
{
    use HasFactory;

    protected $table = 'orders_products';

    protected $keyType = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'order_id',
        'product_id',
        'customer_id',
        'product_code',
        'guest_email',
        'product_name',
        'product_code',
        'product_color',
        'product_size',
        'product_price',
        'product_qty',
        'product_total',
        'is_review',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ordersproduct) {
            $ordersproduct->{$ordersproduct->getKeyName()} = (string) Str::uuid();
        });
    }
}
