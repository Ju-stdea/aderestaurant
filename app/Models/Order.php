<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{

    use HasFactory; use Notifiable;

    
    protected $table = 'orders';
    protected $keyType = 'uuid';
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $casts = [
        'order_date' => 'datetime', // Ensure this matches your actual column name
    ];

    protected $fillable = [
        'customer_id',
        'order_code',
        'transaction_id',
        'order_status',
        'delivery_status',
        'ups_shipping_charges',
        'ups_service_code',
        'ups_service_description',
        'ups_delivery_date',
        'ups_tracking_number',
        'total_weight',
        'payment_status',
        'order_amount',
        'sub_total_amount',
        'grand_total',
        'is_discount',
        'discount_value',
        'coupon_code',
        'coupon_amount',
        'payment_method',
        'payment_gateway',
        'courier_name',
        'is_review',
        'order_date',
        'ups_service_name'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            // $model->uuid = Uuid::uuid4()->toString();
            $model->order_code = self::generateOrderCode();
            if (empty($model->id)) {
                // $model->id = (string) Str::uuid();
                $model->id = Uuid::uuid4()->toString();
            }
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'order_id');
    }

    public function orders_products(){
        return $this->hasMany(OrdersProduct::class, 'order_id', 'id');
    }

    // Method to generate unique order_code
    public static function generateOrderCode()
    {
        do {
            $code = Str::upper(Str::random(10)); // Generate a random string of 10 characters
        } while (self::where('order_code', $code)->exists()); // Ensure the code is unique

        return $code;
    }
}