<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\DeliveryAddress;
use App\Models\Order;
use App\Models\Shipment;
use Illuminate\Http\Request;

class FrontOrdersController extends Controller
{
    public function orderDetails($id)
    {
        $order = $this->getOrderWithProducts($id);

        if (!$order) {
            abort(404, 'Order not found');
        }

        $customer = Customer::find($order->customer_id);
        if (!$customer) {
            abort(404, 'Customer not found');
        }

        $customerAddress = DeliveryAddress::where('user_id', $order->customer_id)->first();

        $shipment = Shipment::where('order_id', $order->id)->first();

        return view('front.orders.view_order', [
            'order' => $order,
            'customer' => $customer,
            'customerAddress' => $customerAddress,
            'shipment' => $shipment
        ]);
    }

    private function getOrderWithProducts($id)
    {
        $order = Order::with(['orders_products.product'])->where('id', $id)->first();

        if (!$order) {
            abort(404, 'Order not found');
        }

        return $order;
    }

}
