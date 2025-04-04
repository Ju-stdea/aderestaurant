<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminHomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    public function dashboard()
    {
        $startDate = \Carbon\Carbon::now()->startOfMonth();
        $endDate = \Carbon\Carbon::now()->endOfMonth();

        $todayStart = \Carbon\Carbon::today()->startOfDay();
        $todayEnd = \Carbon\Carbon::today()->endOfDay();

        $allSales = Order::where('payment_status', 'Paid')
            ->where('order_status', 'Completed')
            ->sum('grand_total');
        $totalSales = Order::where('payment_status', 'Paid')
            ->where('order_status', 'Completed')
            ->whereBetween('order_date', [$startDate, $endDate])
            ->sum('grand_total');
        // $totalSales = number_format($totalSales, 2);
        $totalSales = (float) $totalSales;
        // dd($totalSales); die;
        $formattedAmount = '$' . number_format($totalSales, 2);
        // $allSales = number_format($allSales, 2);

        $pendingSales = Order::where('payment_status', 'Paid')
            ->where('order_status', 'Pending')
            ->whereBetween('order_date', [$startDate, $endDate])
            ->sum('grand_total');
        $pendingSales = (float) $pendingSales;
        // dd($totalSales); die;
        $formattedPendingAmount = '$' . number_format($pendingSales, 2);
        // $allSales = number_format($allSales, 2);

        $todaySales = Order::where('payment_status', 'Paid')
            ->where('order_status', 'Completed')
            ->whereBetween('order_date', [$todayStart, $todayEnd])
            ->sum('grand_total');

        $todaySales = (float) $todaySales;
        $formattedTodaySales = '$' . number_format($todaySales, 2);

        $allSales = (float) $allSales;
        $formattedAllAmount = '$' . number_format($allSales, 2);
        $totalOrders = Order::where('order_status', 'Completed')
            ->where('payment_status', 'Paid')
            ->whereBetween('order_date', [$startDate, $endDate])->count();
        $newPendingOrders = Order::where('order_status', 'Pending')
            ->where('payment_status', 'Paid')
            ->whereBetween('order_date', [$todayStart, $todayEnd])->count();

        $pendingOrders = Order::where('order_status', 'Pending')
            ->where('payment_status', 'Paid')
            ->whereBetween('order_date', [$startDate, $endDate])->count();
        $guestCustomers = Order::where('customer_id', Null)->count();
        $nonguestCustomers = Order::whereNotNull('customer_id')->count();
        $ordersCount = [];

        // Get the current date
        $currentMonth = Carbon::now();
        for ($i = 0; $i <= 10; $i++) {
            $targetDate = $currentMonth->copy()->subMonths($i);
            $ordersCount[] = Order::whereYear('created_at', $targetDate->year)
                ->whereMonth('created_at', $targetDate->month)
                ->count();
        }
        $orders = Order::with('orders_products')->leftjoin('customers', 'orders.customer_id', '=', 'customers.id')
            ->where(function ($query) {
                $query->where('order_status', '!=', 'pending')
                    ->orWhere('payment_status', '!=', 'pending');
            })
            ->orderBy('updated_at', 'desc')->take(20)
            ->get([
                'orders.*',
                'customers.first_name',
                'customers.last_name'
            ]);
        return view('admin.dashboard', compact('totalSales', 'formattedAmount', 'allSales', 'formattedAllAmount', 'formattedTodaySales', 'todaySales', 'pendingSales', 'totalOrders', 'pendingOrders', 'newPendingOrders', 'guestCustomers', 'nonguestCustomers', 'ordersCount', 'orders'));
    }

    public function updatePassword()
    {
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first();

        $adminDetails->load('roles');

        $adminRole = $adminDetails->roles->first()->name ?? 'No Role Assigned';
        return view('admin.admin_settings')->with(compact('adminDetails', 'adminRole'));
    }

    // public function updateCurrentPassword(Request $request){
    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         if(Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)){
    //             if($data['new_pwd'] == $data['confirm_pwd']){
    //                 Admin::where('id', Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);

    //                 Auth::guard('admin')->logout();
    //                 Session::flash('success_message', 'Password has been updated successfully');

    //             }else{
    //                 Session::flash('error_message', 'New Password and Confirm Password does not match');
    //             }
    //         }else{
    //             Session::flash('error_message', 'Your current password is incorrect');
    //             return redirect()->back();
    //         }
    //         return redirect()->back(); 
    //     }
    // }

    // public function updateAdminDetails(Request $request){
    //     Session::put('page', 'update-admin-details');
    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         // echo "<pre>"; print_r($data); die;
    //         $rules = [
    //             'admin_name'=> 'required|regex:/^[\pL\s-]+$/u',
    //             'admin_mobile' => 'required|numeric',
    //             // 'admin_image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048'
    //             'admin_image'=> 'image'
    //         ];
    //         $customMessages = [
    //             'admin_name.required' => 'Name is required',
    //             'admin_name.alpha' => 'Valid Name is required',
    //             'admin_mobile.required' => 'Mobile is required',
    //             'admin_mobile.numeric' => 'Valid Mobile is requird',
    //             'admin_image.image' => 'Valid Image is required'
    //         ];

    //         $this->validate($request, $rules, $customMessages);

    //         //Upload image
    //         if($request->hasFile('admin_image')){
    //             $image_tmp = $request->file('admin_image');
    //             if($image_tmp->isValid()){
    //                 // Get Image Extension
    //                 $extension = $image_tmp->getClientOriginalExtension();
    //                 // Generate New Image Name
    //                 $imageName = rand(111, 99999). '.'. $extension;
    //                 $imagePath = 'images/admin_images/admin_photos/'.$imageName;

    //                 // Upload the image 
    //                 // Image::make($image_tmp)->save($imagePath);

    //                 // Resize Image 
    //                 Image::make($image_tmp)->resize(300, 400)->save($imagePath);
    //             }else if(!empty($data['current_admin_image'])){
    //                 $imageName = $data['current_admin_image'];
    //             }else{
    //                 $imageName= "";
    //             }
    //         }

    //         // Update Admin Details 
    //         Admin::where('email', Auth::guard('admin')->user()->email)->update(['name' => $data['admin_name'], 'mobile' => $data['admin_mobile'], 'image'=>$imageName]);
    //         session::flash('success_message', 'Admin details updated successfully');
    //         return redirect()->back();
    //     }
    //     return view('admin.update_admin_details');
    // }

    public function adminsSubadmins()
    {
        $admins = Admin::with('roles')
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'developer');
            })
            ->get();

        return view('admin.admins_subadmins.admins_subadmins', compact('admins'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $newStatus = $request->input('status');
        $admin->status = $newStatus;
        $admin->save();

        $message = $newStatus == 'ACTIVE' ? 'Admin enabled successfully.' : 'Admin disabled successfully.';

        return redirect()->back()->with('success_message', $message);
    }

    public function addEditAdminSubadmin(Request $request, $id = null)
    {

        if ($id == null) {
            // Add Admin
            $title = "Add Admin";
            $admin = new Admin;
            $message = "Admin added successfully!";
            $adminRole = null;
        } else {
            // Edit Admin
            $title = "Edit Admin";
            $admin = Admin::where('id', $id)->first();
            $message = "Admin updated successfully!";
            $adminRole = $admin->roles()->pluck('role_id')->first();
        }

        $roles = Role::all();

        if ($request->isMethod('post')) {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'mobile' => 'required|string|max:15',
                'email' => 'required|email|max:255|unique:admins,email,' . ($id ? $admin->id : 'NULL') . ',id',
                'admin_type' => 'required|exists:roles,id',
                'password' => $id ? 'nullable|string|min:8' : 'required|string|min:8',
            ]);

            $admin->first_name = $request->first_name;
            $admin->last_name = $request->last_name;
            $admin->mobile = $request->mobile;
            $admin->email = $request->email;
            if ($request->password) {
                $admin->password = Hash::make($request->password);
            }
            $admin->status = 'ACTIVE';

            $admin->save();

            $admin->roles()->sync([$request->admin_type]);

            Session::flash('success_message', $message);
            return redirect()->route('admin.addEditAdminSubadmin', $admin->id);
        }

        return view('admin.admins_subadmins.add_edit_admin_subadmin', compact('title', 'admin', 'roles', 'adminRole'));
    }

    public function addEditPermissions(Request $request, $admin_id, $role_id)
    {
        $admin = Admin::findOrFail($admin_id);
        $role = Role::findOrFail($role_id);
        $permissions = Permission::all();

        if ($request->isMethod('post')) {
            // Handle form submission
            DB::table('admin_role_permission')->where([
                ['admin_id', '=', $admin_id],
                ['role_id', '=', $role_id],
            ])->delete(); // Clear existing permissions for the role

            if ($request->has('permissions')) {
                foreach ($request->input('permissions') as $permissionId) {
                    DB::table('admin_role_permission')->updateOrInsert(
                        [
                            'admin_id' => $admin_id,
                            'role_id' => $role_id,
                            'permission_id' => $permissionId,
                        ]
                    );
                }
            }

            return redirect()->back()->with('success_message', 'Permissions updated successfully.');
        }

        // Display the form
        $assignedPermissions = DB::table('admin_role_permission')
            ->where([
                ['admin_id', '=', $admin_id],
                ['role_id', '=', $role_id],
            ])
            ->pluck('permission_id')
            ->toArray();

        return view('admin.admins_subadmins.update_roles', compact('admin', 'role', 'permissions', 'assignedPermissions'));
    }
}
