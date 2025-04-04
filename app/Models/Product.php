<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Ramsey\Uuid\Uuid;
use Session;

class Product extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = 'products';
    protected $keyType = 'uuid';
    public $incrementing = false;
    protected $primaryKey = 'id';

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            // $model->id = Uuid::uuid4()->toString();
            if (empty($model->id)) {
                // $model->id = (string) Str::uuid();
                $model->id = Uuid::uuid4()->toString();
            }
        });

    }

    protected $fillable = [
        'product_name',
        'product_code',
        'product_color',
        'product_price',
        'product_discount',
        'stock',
        'product_weight',
        'product_video',
        'main_image',
        'description'
    ];

    public function attributes()
    {
        return $this->hasMany(ProductsAttribute::class);
    }

    public function images()
    {
        return $this->hasMany(ProductsImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public static function productFilters()
    {
        // Product Filters 
        $productFilters['productArray'] = array('Beverage', 'Clothing', 'Beauty & Personal Care', 'Food & Groceries', 'Home and Garden', 'Other');
        return $productFilters;

    }

    public static function getReviews($product_id)
    {
        $averageRating = number_format(Review::where('product_id', $product_id)
            ->avg('rating'), 2);
        return $averageRating;
    }

    public static function getDiscountedPrice($product_id)
    {
        // Fetch product details
        $proDetails = Product::select('product_price', 'product_discount', 'category_id')->where('id', $product_id)->first();

        // Check if product exists
        if (!$proDetails) {
            return null; // or throw an exception if preferred
        }

        // Convert product details to array
        $proDetails = $proDetails->toArray();

        // Initialize discounted price
        $discounted_price = $proDetails['product_price'];  // Default to original price

        // Calculate discount if applicable
        if ($proDetails['product_discount'] > 0) {
            $discounted_price = $proDetails['product_price'] - ($proDetails['product_price'] * $proDetails['product_discount'] / 100);
        }else{
            $discounted_price = 0;
        }

        // Return formatted discounted price
        return number_format($discounted_price, 2);
    }



    public static function getDiscountedAttrPrice($product_id, $size)
    {
        $proAttrPrice = ProductsAttribute::where(['product_id' => $product_id, 'size' => $size])->first()->toArray();
        $proDetails = Product::select('product_discount', 'category_id')->where('id', $product_id)->first()->toArray();
        // echo "<pre>"; print_r($proDetails); die;
        $catDetails = Category::select('category_discount')->where('id', $proDetails['category_id'])->first()->toArray();
        if ($proDetails['product_discount'] > 0) {
            // If Product Discount is Added from Admin Panel
            $final_price = $proAttrPrice['price'] - ($proAttrPrice['price'] * $proDetails['product_discount'] / 100);

            $discount = $proAttrPrice['price'] - $final_price;
            // Sale Price = Cost Price - Discount Price
            //  450        =    500- (500* 10/100 = 50)
        } else if ($catDetails['category_discount'] > 0) {
            // If Product Discount is not added and Category discount addded from admin panel
            $final_price = $proAttrPrice['price'] - ($proAttrPrice['price'] * $catDetails['category_discount'] / 100);
            $discount = $proAttrPrice['price'] - $final_price;
        } else {
            $final_price = $proAttrPrice['price'];
            $discount = 0;
        }
        // return $discounted_price;
        return array('product_price' => $proAttrPrice['price'], 'final_price' => $final_price, 'discount' => $discount);
    }

    public static function getProductImage($product_id)
    {
        $getProductImage = Product::select('image_url')->where('id', $product_id)->first()->toArray();
        // echo $getProductImage['image_url']; die;
        return $getProductImage['image_url'];
    }

    public static function getProductStatus($product_id)
    {
        $getProductStatus = Product::select('status')->where('id', $product_id)->first()->toArray();
        return $getProductStatus['status'];
    }

    public static function getProductStock($product_id, $product_size)
    {
        $getProductStock = ProductsAttribute::select('stock')->where(['product_id' => $product_id, 'size' => $product_size])->first()->toArray();
        // echo $getProductStock['stock']; die;
        return $getProductStock['stock'];
    }

    public static function getAttributeCount($product_id, $product_size)
    {
        // echo $getProductCount = ProductsAttribute::where(['product_id' => $product_id, 'size' => $product_size, 'status' => 1])->count(); die;
        $getAttributeCount = ProductsAttribute::where(['product_id' => $product_id, 'size' => $product_size, 'status' => 1])->count();
        return $getAttributeCount;
    }

    public static function getCategoryStatus($category_id)
    {
        $getCategoyStatus = Category::select('status')->where('id', $category_id)->first()->toArray();
        return $getCategoyStatus['status'];
    }

    public static function deleteCartProduct($product_id)
    {
        Cart::where('product_id', $product_id)->delete();
    }

    public function product()
    {
        return $this->hasMany(OrdersProduct::class, 'product_id', 'uuid');
    }

    public static function checkStockLimit()
    {
        $cartItemsQuery = auth()->check()
            ? Cart::where('customer_id', auth()->id())
            : Cart::where('session_id', Session::getId());

        $cartItems = $cartItemsQuery->with(['product', 'customer'])->get();

        foreach ($cartItems as $item) {
            $product = Product::where('id', $item->product->id)->first();

            if ($product) {
                if ($product->stock < $item->quantity) {
                    $errorMessage = 'Not enough stock for product: ' . $product->product_name;
                    return $errorMessage;
                }
            } else {
                $errorMessage = 'Product not found: ' . $item->product->product_name;
                return $errorMessage;
            }
        }
        return null;
    }

}
