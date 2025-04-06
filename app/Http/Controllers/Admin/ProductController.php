<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Cloudinary\Uploader;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductsImage;
use App\Models\Review;
use App\Models\ProductsAttribute;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function listProducts(){
        $products = Product::orderBy('updated_at', 'desc')
                    ->get(['products.*', DB::raw("(SELECT ROUND (AVG(products_reviews.rating))
                        FROM products_reviews WHERE products_reviews.product_id = products.id) as ratings"), 
                        DB::raw("(SELECT COUNT(products_reviews.id)
                        FROM products_reviews
                        WHERE products_reviews.product_id = products.id) as review_count")
                    ]);
        return view('admin.products.list_products')->with(compact('products'));
    }

    public function productListReviews($id){
        $product = Product::where('id', $id)->first();
        $starRating = number_format(Review::where('product_id', $id)
            ->avg('rating'), 0);
        $averageRating = number_format(Review::where('product_id', $id)
            ->avg('rating'), 2);

        $totalReviews = Review::where('product_id', $id)
            ->count();

        $ratingsDistribution = Review::where('product_id', $id)
            ->selectRaw('rating, count(*) as count')
            ->groupBy('rating')
            ->pluck('count', 'rating')
            ->all();
        $ratingsDistribution = array_replace(array_fill(1, 5, 0), $ratingsDistribution);
        $totalReviewsDist = array_sum($ratingsDistribution);
        $totalReviewsDist = $totalReviewsDist !== 0 ? $totalReviewsDist : 1;
        $percentageDistribution = [];

        foreach ($ratingsDistribution as $rating => $count) {
            $percentage = ($count / $totalReviewsDist) * 100;
            $percentageDistribution[$rating] = round($percentage);
        }

        $ratingsData = [
            'totalReviews' => $totalReviewsDist,
            'countDistribution' => $ratingsDistribution,
            'percentageDistribution' => $percentageDistribution,
        ];

        // dd($ratingsData['countDistribution']); die;

        $startDate = \Carbon\Carbon::now()->startOfMonth();
        $endDate = \Carbon\Carbon::now()->endOfMonth();

        $query = Review:: leftjoin('products', 'products_reviews.product_id', '=', 'products.id')
                    ->leftjoin('customers', 'products_reviews.customer_id', '=', 'customers.id')
                    ->where('product_id', $id);

        $productReviews = $query->whereBetween('products_reviews.created_at', [$startDate, $endDate])
                    ->get(['products_reviews.*', 'products.product_name', 'customers.first_name', 'customers.last_name']);
        // dd($productReviews); die;
        $all = Review::count();
        $opened = Review::where('status', "Open")->count();
        $closed = Review::where('status', "Close")->count();
        return view('admin.products.list_product_reviews')->with(compact('starRating', 'averageRating', 'totalReviews', 'product', 'ratingsData', 'productReviews', 'all', 'opened', 'closed'));
    }

    public function addEditProduct(Request $request, $id= null){
        if($id == ""){
            $title = "Add Product";
            $product = new Product;
            $productdata= array();
            $message = "Product added successfully";
    
        }else{
            $title  = "Edit Product";
            $productdata = Product::where('id', $id)->first();
            $product = Product::where('id', $id)->first();
            $message = "Product updated successfully";
        }
    
        if($request->isMethod('post')){
            $data = $request->all();
    
            $validator = Validator::make($data, [
                'product_name' => [
                    'required',
                    'string',
                    Rule::unique('products', 'product_name')->ignore($product->id ?? null),
                ],
                'product_price' => 'required|string',
                'stock' => 'required',
                'product_weight' => 'required'
            ], [
                'product_name.unique' => 'This product name already exists',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            $categoryDetails = Category::where('id', $request->category_id)->first();
    
            $product->category_id =    $request->category_id;
            $product->product_name =   $request->product_name;
            $product->product_code =   $request->product_code;
            $product->product_price =  $request->product_price;
            $product->product_discount = $request->product_discount;
            $product->stock =   $request->stock;
            $product->product_weight =  $request->product_weight;        
            $product->description =    $request->product_description;
            $product->meta_title =     $request->meta_title;
            $product->meta_keywords =  $request->meta_keywords;
            $product->meta_description =$request->meta_description;
        
            //dd(config('cloudinary'));

            // Check if a new image is uploaded
            if ($request->hasFile('main_image')) {
                // Delete the old image from Cloudinary if it exists
                if (!empty($product->image_id)) {
                    cloudinary()->destroy($product->image_id);
                }
    
                // Upload new image to Cloudinary
              $uploadCloudinary = cloudinary()->uploadApi()->upload(
                    $request->file('main_image')->getRealPath(),
                    [
                        'folder' => 'jhabis/products',
                        'resource_type' => 'auto',
                        'transformation' => [
                            'quality' => 'auto',
                            'fetch_format' => 'auto'
                        ]
                    ]
                );
                $imageUrl = $uploadCloudinary['secure_url'];
                $imageId = $uploadCloudinary['public_id'];

            } else {
                $imageUrl = $product->image_url; 
                $imageId = $product->image_id;
            }
            $product->image_id = $imageId;
            $product->image_url = $imageUrl;
    
            // Handle video upload
            if ($request->hasFile('product_video')) {
                $uploadCloudinary = cloudinary()->uploadApi()->upload(
                    $request->file('product_video')->getRealPath(),
                    [
                        'folder' => 'jhabis/products/videos',
                        'resource_type' => 'video'
                    ]
                );
                $videoUrl = $uploadVideoCloudinary['secure_url'];
                $videoId = $uploadVideoCloudinary['public_id'];
            } else {
                $videoUrl = $product->video_url ?? null;
                $videoId = $product->video_id ?? null;  
            }
    
            $product->video_id = $videoId;
            $product->video_url = $videoUrl;
    
            $product->is_featured = !empty($request->is_featured) ? $request->is_featured : "No";
            $product->status = 'ACTIVE';
            $product->save();
    
            session::flash('success_message', $message);
            return redirect('admin/products'); 
        }
    
        $categories = Category::get(); 
        return view('admin.products.add_edit_product')->with(compact('categories', 'productdata'));
    }

    public function deleteProduct($id){
        $productImage = Product::select('image_url', 'image_id')->where('id', $id)->first();
        cloudinary()->uploadApi()->destroy($productImage->image_id);
        Product::where('id', $id)->delete();
        $message = 'Product been deleted successfully';
        session::flash('success_message', $message);
        return redirect()->back();
    }

    public function addAttributes(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            foreach ($data['sku'] as $key => $value) {
                if(!empty($value)){
                    // SKU already exists check
                    $attrCountSKU = ProductsAttribute::where('sku', $value)->count();
                    if($attrCountSKU> 0){
                        $message = 'SKU already exists. Please add another SKU!';
                        session::flash('error_message', $message);
                        return redirect()->back();
                    }

                    // Size already exists
                    $attrCountSize = ProductsAttribute::where(['product_id'=> $id, 'size'=> $data['size'][$key]])->count();
                    if($attrCountSize > 0){
                        $message = "Size already exists. Please add another Size!";
                        session::flash('error_message', $message);
                        return redirect()->back();
                    }

                    $attribute= new ProductsAttribute;
                    $productId = Product::where('id', $id)->first();
                    $attribute->product_id= $productId->id;
                    $attribute->sku =   $value;
                    $attribute->size =  $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->status = "ACTIVE";
                    $attribute->save();

                }
            }

            $success_message = "Product Attributes has added successfully";
            session::flash('success_message', $success_message);
            return redirect()->back();
        }
        // $productdata = Product::select('id', 'product_name', 'product_code', 'product_color', 'product_price', 'image_url')->with('attributes')->find($id);
        $productdata = Product::select('id', 'id', 'product_name', 'product_code', 'product_color', 'product_price', 'image_url')->with('attributes')->where('id', $id)->first();
        // $categorydata = Category::where('id', $id)->first();

        // $productdata = json_decode(json_encode($productdata), true);
        // echo "<pre>"; print_r($productdata); die;
        $title = "Product Attributes";
        return view('admin.products.add_attributes')->with(compact('productdata', 'title'));
    }

    public function editAttributes(Request $request, $id){
        if($request->isMethod('post')){
            $data= $request->all();
            // echo "<pre>"; print_r($data); die;
            foreach($data['attrId'] as $key => $attr){
                if(!empty($attr)){
                    ProductsAttribute::where(['id'=>$data['attrId'][$key]])->update(['price'=> $data['price'][$key], 'stock'=>$data['stock'][$key]]);
                }
            }
            $message ="Product Attributes has been updated successfully";
            session::flash('success_message', $message);
            return redirect()->back();
        }
    }

    public function updateProductStatus(Request $request){
        if($request->ajax()){
            $data= $request->all();
            if($data['status'] == "ACTIVE"){
                $status= 'INACTIVE';
            }else{
                $status = 'ACTIVE';
            }

            Product::where('id', $data['product_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'product_id'=> $data['product_id']]);
        }
    }

    public function updateAttributeStatus(Request $request){
        if($request->ajax()){
            $data= $request->all();
            // echo "<pre>"; print_r($data); die;
            if($data['status'] == "Active"){
                $status= 0;
            }else{
                $status = 1;
            }

            ProductsAttribute::where('id', $data['attribute_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'attribute_id'=> $data['attribute_id']]);
        }
    }

    public function updateImageStatus(Request $request){
        if($request->ajax()){
            $data= $request->all();
            if($data['status'] == "ACTIVE"){
                $status= 'INACTIVE';
            }else{
                $status = 'ACTIVE';
            }

            ProductsAttribute::where('id', $data['image_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'image_id'=> $data['image_id']]);
        }
    }

    public function deleteAttribute($id){
        ProductsAttribute::where('id', $id)->delete();
        $message = "Product Attribute has been deleted successfully";
        session::flash('success_message', $message);
        return redirect()->back();
    }

    public function addImages(Request $request, $id){
        if($request->isMethod('post')){
            $data= $request->all();
            if($request->hasFile('images')){
                $productImages = $request->file('images');

                if ($productImages) {
                    foreach ($productImages as $productImage) {
                        $uploadProductImage = cloudinary()->uploadApi()->upload($productImage->getRealPath(), [
                            'folder' => 'jhabis/products',
                            'transformation' => [
                                'quality' => 'auto',
                                'fetch_format' => 'auto'
                            ]
                        ]);
                        $imageUrl = $uploadProductImage['secure_url'];
                        $imageId = $uploadProductImage['public_id'];

                        $productId = Product::where('id', $id)->first();
                        $productImg = new ProductsImage();
                        $productImg->product_id = $productId->id;
                        $productImg->image_url = $uploadProductImage['secure_url'];
                        $productImg->image_id = $uploadProductImage['public_id'];
                        $productImg->save();
                    }
                }
                $message ="Product Images has been added successfully";
                session::flash('success_message', $message);
                return redirect()->back();
            }
        }
        $productdata = Product::with('images')->select('id', 'id', 'product_name', 'product_code', 'product_color', 'image_url')->where('id', $id)->first();
        // dd($productdata); die;
        // $productdata = json_decode(json_encode($productdata), true);
        // $categorydata = Category::where('id', $id)->first();

        $title= "Product Images";
        return view('admin.products.add_images')->with(compact('title', 'productdata'));
    }

  

    public function deleteImage($id){
        // Get Category Image
        $productImage = ProductsImage::select('image_url', 'image_id')->where('id', $id)->first();
        cloudinary()->uploadApi()->destroy($productImage->image_id);

        // Delete Product Image from products_images table 
        ProductsImage::where('id', $id)->delete();

        $message = 'Product image has been deleted successfully';
        session::flash('success_message', $message);
        return redirect()->back();

    }
}
