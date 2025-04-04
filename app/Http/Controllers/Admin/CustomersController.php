<?php

namespace App\Http\Controllers\Admin;
use App\Models\Customer;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator; 

class CustomersController extends Controller
{
    public function listCustomers(){
        $customers = Customer::get(); 
        return view('admin.customers.list_customers')->with(compact('customers'));
    }

    public function guestCustomers(){
        $guestcustomers = Order::where('customer_id', Null)->get();
        return view('admin.customers.guest_customers')->with(compact('guestcustomers'));
    }
    public function nonGuestCustomers(){
        // dd("Hello"); die;
        $nonguestcustomers = Order::whereNotNull('customer_id')->get();
        // dd($nonguestcustomers); die;
        return view('admin.customers.non_guest_customers')->with(compact('nonguestcustomers'));
    }

    public function updateCustomerStatus(Request $request){
        if($request->ajax()){
            $data= $request->all();
            // dd($data); die;
            if($data['status'] == "ACTIVE"){
                $status= 'INACTIVE';
            }else{
                $status = 'ACTIVE';
            }

            Customer::where('id', $data['customer_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'customer_id'=> $data['customer_id']]);
        }
    }

    public function deleteCustomer($id){
        Customer::where('id', $id)->delete();
        $message = 'Customer been deleted successfully';
        session::flash('success_message', $message);
        return redirect()->back();
    }
}
