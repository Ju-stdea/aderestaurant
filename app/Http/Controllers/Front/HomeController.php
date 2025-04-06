<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //To view all categories
        $categories = Category::orderBy('category_name', 'asc')->get();
        $isCoverCategories = Category::where('is_cover', true)
            ->get();
        $banners = Banner::get();
        
        $page = request()->get('page', 1);

        // Define the number of items per page
        $perProductPage = 12;
        $perArrivalPage = 16;

        // Retrieve paginated products
        $products = Product::orderBy('created_at', 'desc')
            ->with('reviews')
            ->paginate($perProductPage, ['*'], 'page', $page);

        // Calculate average rating for products
        $averageRating = $products->flatMap(function ($product) {
            return $product->reviews;
        })->avg('rating');

        // Retrieve paginated recent arrivals
        $arrivals = Product::where('created_at', '>=', Carbon::now()->subDays(1))
            ->take(12)
            ->with('reviews')
            ->get();

        //Top Selling 
        $topsellings = Product::orderBy('created_at', 'desc')
                          ->take(6)
                          ->with('reviews')
                          ->get();
        //Popular Sales
        $popularsales  = Product::orderBy('created_at', 'desc')
                          ->take(12)
                          ->with('reviews')
                          ->get();


        // Get the first category added to the database
         $firstCategory = Category::where('category_name', 'Flour')->orderBy('created_at', 'desc')->first();

        // Fetch the first 4 products under the first category
        $productItems = Product::where('category_id', $firstCategory->id)
                            ->take(4)
                            ->with('reviews')
                            ->get();

        return view('welcome')->with(compact('categories', 'products', 'arrivals', 'banners', 'isCoverCategories', 'topsellings', 'popularsales', 'productItems', 'firstCategory', 'averageRating'));
    }
}  
