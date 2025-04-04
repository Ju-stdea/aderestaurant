<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsImage;
use App\Models\ProductsAttribute;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Review;
// use App\Models\Order;
use App\Models\OrdersProduct;

class ProductsController extends Controller
{

    public function flashSale()
    {

        $products = Cache::remember('products', 60, function () {
            return Product::all();
        });

        $averageRating = $products->flatMap(function ($product) {
            return $product->reviews;
        })->avg('rating');

        return view('front.flash-sale.index', compact('products', 'averageRating'));
    }

    public function search(Request $request)
    {
        $searchProducts = $request->input('search');
        $searchCategory = $request->input('category');

        // Initialize query builder
        $query = Product::query();

        if ($searchCategory) {
            $category = Category::where('category_name', $searchCategory)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            } else {
                // Return empty collection if category is not found
                return collect();
            }
        }

        if (!empty($searchProducts)) {
            $query->where(function ($query) use ($searchProducts) {
                $query->where('product_name', 'LIKE', "%{$searchProducts}%")
                    ->orWhere('product_price', 'LIKE', "%{$searchProducts}%");
            });
        }



        // Execute query and return results
        $results = $query->get();

        return $results;
    }



    public function products(Request $request)
    {
        //To view all categories
        $categories = Category::get();
        //To view all products
        $products = Cache::remember('front.home' . request()->get('page', 1), 60, function () {
            return Product::orderBy('created_at', 'desc')
                ->with('reviews')
                ->paginate(16, ['*'], 'products');
        });

        // Calculate the total results and the current range
        $totalResults = $products->total();
        $currentPage = $products->currentPage();
        $itemsPerPage = $products->perPage();
        $startIndex = ($currentPage - 1) * $itemsPerPage + 1;
        $endIndex = min($currentPage * $itemsPerPage, $totalResults);

        $searchResults = $this->search($request);


        $averageRating = $products->flatMap(function ($product) {
            return $product->reviews;
        })->avg('rating');
        // dd($averageRating); die;
        return view('front.products.index')->with(compact('categories', 'products', 'totalResults', 'startIndex', 'endIndex', 'searchResults', 'averageRating'));
    }

    public function allProducts()
    {
        return view('front.products.list_all');
    }

    public function single($id)
    {
        // Fetch the product with caching
        $product = Cache::remember("product:{$id}", 60, function () use ($id) {
            return Product::where('id', $id)->first();
        });
        // Check if the product exists
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        // Fetch the product attribute, category, and product images efficiently
        $attribute = ProductsAttribute::where('product_id', $product->id)->first();

        // dd($attribute); die;
        $category = Category::find($product->category_id);
        $images = ProductsImage::where('product_id', $product->id)->get();

        // Fetch the reviews directly from the reviews table based on the product_id
        $reviews = Review::where('product_id', $product->id)->get();

        // Calculate the total number of reviews and the average rating
        $totalReviews = $reviews->count();
        $averageRating = $reviews->avg('rating');

        // Pass the data to the view
        return view('front.product.index', compact('product', 'category', 'attribute', 'images', 'totalReviews', 'averageRating', 'reviews'));
    }

    public function review(Request $request)
    {
        // Validate the incoming GET request
        // dd($request->product_id); die;
        $validate = $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|numeric|min:0|max:5',
            'review' => 'nullable|string|max:255',
        ]);

        $userId = Auth::id();
        $productId = $validate['product_id'];

        // Check if the user has ordered this product
        $order = OrdersProduct::where('customer_id', $userId)
            ->where('product_id', $productId)
            // ->where('order_status', 'ACTIVE')
            ->first();

        if ($order) {
            // Update or create the review
            Review::updateOrCreate([
                'customer_id' => $userId,
                'product_id' => $productId,
            ], [
                'rating' => $validate['rating'],
                'review' => $validate['review'],
                // 'order_id'    => $order->id,
            ]);

            $order->update(['is_review' => "TRUE"]);

            return Redirect::back()->with('status', 'Nice one! Your review on this product has been sent successfully.');
        } else {
            return Redirect::back()->with('error', 'Oops! You must have ordered this product before you can write a review about it.');
        }
    }

    public function sellerProducts()
    {
        return view('front.seller-products.index');
    }

    public function categoryProducts($id)
    {

        // Validate the id format
        // if (!\Ramsey\id\id::isValid($id)) {
        //     return redirect()->back()->with('error', 'Oops something went wrong');
        // }

        // Fetch the category by id
        $category = Category::where('id', $id)->firstOrFail();

        // Fetch the products with caching
        $products = Cache::remember("product:{$id}", 60, function () use ($category) {
            return Product::where('category_id', $category->id)
                ->with('reviews')
                ->get();
        });

        // Fetch all the  category
        $categories = Category::get();

        $averageRating = $products->flatMap(function ($product) {
            return $product->reviews;
        })->avg('rating');


        // Pass the data to the view
        return view('front.products.category', compact('products', 'categories', 'averageRating'));
    }

    private function updateSessionCart()
    {
        $sessionId = session()->getId();
        $cartItems = Cart::where('session_id', $sessionId)->get();
        $cart = [];

        foreach ($cartItems as $item) {
            $product = Product::find($item->product_id);
            if ($product) {
                $cart[$product->id] = [
                    'id' => $product->id,
                    'product_name' => $product->product_name,
                    'product_price' => $product->product_price,
                    'quantity' => $item->quantity,
                    'size' => $item->size,
                    'total' => $item->quantity * $product->product_price,
                    'image_url' => $product->image_url,
                    'session_id' => $sessionId,
                ];
            }
        }

        session()->put('cart', $cart);

        // Optionally update the total amount and quantity in the session
        $totalAmount = array_sum(array_column($cart, 'total'));
        session()->put('totalAmount', $totalAmount);

        $totalQuantity = array_sum(array_column($cart, 'quantity'));
        session()->put('totalQuantity', $totalQuantity);
    }


    public function addToCart(Request $request)
    {
        $productid = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        $size = $request->input('size'); // Nullable

        // Find the product by id
        $product = Product::where('id', $productid)->first();

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Oops! Product not found.'], 404);
        }

        if ($product->stock < 1) {
            return response()->json(['status' => 'error', 'message' => 'Sorry, this product is no longer available.'], 400);
        }

        $sessionId = $request->session()->getId();
        $user = auth()->user(); // Get the logged-in user

        // Create or update the cart item
        $cartItem = Cart::where('session_id', $sessionId)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            // Update quantity if item already exists
            $cartItem->quantity += $quantity;
            $cartItem->size = $size;
            $cartItem->save();
        } else {
            Cart::create([
                'session_id' => $sessionId,
                'order_code' => null,
                'customer_id' => $user ? $user->id : null,
                'product_id' => $product->id,
                'size' => $size,
                'quantity' => $quantity,
            ]);
        }

        // Update session cart for immediate feedback
        $this->updateSessionCart();

        return response()->json(['status' => 'success', 'message' => 'Product added to cart successfully']);
    }
    public function compareProduct()
    {
        return view('front.compare.index');
    }

}
