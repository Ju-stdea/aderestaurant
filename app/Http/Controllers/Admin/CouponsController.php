<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\User;
use App\Models\Customer;
use App\Models\Product;

class CouponsController extends Controller
{
    public function listCoupons(){
        $coupons = Coupon::get(); 
        return view('admin.coupons.list_coupons')->with(compact('coupons'));
    }

    public function updateCouponStatus(Request $request){
        if($request->ajax()){
            $data= $request->all();
            if($data['status'] == "ACTIVE"){
                $status= 'INACTIVE';
            }else{
                $status = 'ACTIVE';
            }

            Coupon::where('id', $data['coupon_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'coupon_id'=> $data['coupon_id']]);
        }
    }
    public function addEditCoupon(Request $request, $id = null){
        if($id == ""){
            // Add Coupon
            $coupon = new Coupon;
            $selCats = array();
            $selUsers = array();
            $selPros = array();
            $title = "Add Coupon";
            $message = "Coupon Added Successfully";
        }else {
            // Update Coupon
            $coupon = Coupon::where('id', $id)->first();
            $selCats = explode(',', $coupon['categories']);
            $selPros = explode(',', $coupon['products']);
            $selUsers = explode(',', $coupon['users']);
            $title= "Edit Coupon";
            $message = "Coupon Updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            $validator = Validator::make($data, [
                'coupon_code' => 'required|string|unique:coupons,coupon_code' . ($id ? ",$id" : ''),
                'coupon_type' => 'required|string',
                'coupon_amount' => 'required|string',
                'valid_from' => 'required|string',
                'valid_to' => 'required|string',
            ], [
                'coupon_code.unique' => 'This coupon code already exists',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if(isset($data['users'])){
                $users = implode(',', $data['users']);
            }else{
                $users = "";
            }
            if(isset($data['categories'])){
                $categories = implode(',', $data['categories']);
            }else {
                $categories = ""; 
            }
            if(isset($data['products'])){
                $products = implode(',', $data['products']);
            }else {
                $products = ""; 
            }
            
            $coupon->coupon_code =  $request->coupon_code;
            $coupon->categories =   $categories;
            $coupon->products =     $products;
            $coupon->users =        $users;
            $coupon->coupon_type =  $data['coupon_type'];
            $coupon->description =  $data['description'];
            $coupon->coupon_amount =       $data['coupon_amount'];
            $coupon->valid_from =   $data['valid_from'];
            $coupon->valid_to =     $data['valid_to'];
            $coupon->status =       'ACTIVE';
            $coupon->save();
            session::flash('success_message', $message);
            return redirect('admin/coupons');
        }
        $categories = Category::get();
        $categories= json_decode(json_encode($categories), true);
        // dd($categories); die;

        $products = Product::get();
        $products= json_decode(json_encode($products), true);

        // dd($products); die;
        $users = Customer::select('first_name', 'last_name', 'email')->where('status', 'ACTIVE')->get()->toArray();
        return view('admin.coupons.add_edit_coupon')->with(compact('title', 'coupon', 'categories', 'products', 'users', 'selCats', 'selUsers', 'selPros'));
    }

    public function deleteCoupon($id){
        Coupon::where('id', $id)->delete();
        $message = 'Coupon been deleted successfully';
        session::flash('success_message', $message);
        return redirect()->back();
    }
}
