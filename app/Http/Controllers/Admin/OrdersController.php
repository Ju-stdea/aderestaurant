<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderStatusUpdated;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Mail;

class OrdersController extends Controller
{
    public function listOrders()
    {
        // $orders = Order::get(); 
        $orders = Order::with('orders_products')->leftjoin('customers', 'orders.customer_id', '=', 'customers.id')
            ->orderBy('updated_at', 'desc')->take(100)
            ->get([
                'orders.*',
                'customers.first_name',
                'customers.last_name'
            ]);
        return view('admin.orders.list_orders')->with(compact('orders'));
    }

    public function orderDetails($id)
    {
        $order = $this->getOrderWithProducts($id);

        $customer = $this->getCustomerInfo($order);

        $customerAddress = $this->getCustomerAddress($order);

        $shipment = Shipment::where('order_id', $order->id)->first();

        return view('admin.orders.view_order', [
            'order' => $order,
            'customer' => $customer,
            'customerAddress' => $customerAddress,
            'shipment' => $shipment,
        ]);
    }

    // Fetch the order with related products
    private function getOrderWithProducts($id)
    {
        $order = Order::with(['orders_products.product'])->where('id', $id)->first();

        if (!$order) {
            abort(404, 'Order not found');
        }

        return $order;
    }

    private function getCustomerInfo($order)
    {
        if ($order->customer_id) {
            $customer = Customer::find($order->customer_id);
            if (!$customer) {
                abort(404, 'Customer not found');
            }
            return $customer;
        }

        $billingAddress = json_decode($order->billing_address, true);

        return (object) [
            'guest' => true,
            'first_name' => $billingAddress['firstname'] ?? '',
            'last_name' => $billingAddress['lastname'] ?? '',
            'email' => $order->guest_email ?? '',
            'mobile' => $billingAddress['phone'] ?? '',
        ];
    }

    private function getCustomerAddress($order)
    {
        if ($order->delivery_method === 'ship') {
            $deliveryAddress = json_decode($order->shipping_address, true);
            return (object) [
                'firstname' => $deliveryAddress['firstname'] ?? '',
                'lastname' => $deliveryAddress['lastname'] ?? '',
                'phone' => $deliveryAddress['phone'] ?? '',
                'city' => $deliveryAddress['city'] ?? '',
                'state' => $deliveryAddress['state'] ?? '',
                'postal_code' => $deliveryAddress['postal_code'] ?? '',
                'address_line' => $deliveryAddress['address'] ?? '',
                'country' => $deliveryAddress['country'] ?? '',
            ];
        } else {
            $billingAddress = json_decode($order->billing_address, true);
            return (object) [
                'firstname' => $billingAddress['firstname'] ?? '',
                'lastname' => $billingAddress['lastname'] ?? '',
                'phone' => $billingAddress['phone'] ?? '',
                'city' => $billingAddress['city'] ?? '',
                'state' => $billingAddress['state'] ?? '',
                'postal_code' => $billingAddress['postal_code'] ?? '',
                'address_line' => $billingAddress['address'] ?? '',
                'country' => $billingAddress['country'] ?? '',
            ];
        }
    }


    public function viewOrderInvoice($id)
    {
        $orderDetails = Order::with('orders_products')->where('id', $id)->first();
        // $customerDetails = Customer::where('id', $orderDetails->customer_id)->first();
        // dd($orderDetails); die;
        return view('admin.orders.order_invoice')->with(compact('orderDetails'));
    }

    public function printPDFInvoice($id)
    {
        $orderDetails = Order::with('orders_products')->where('id', $id)->first()->toArray();
        // dd($orderDetails);die;
        $customerDetails = Customer::where('email', json_decode($orderDetails->billing_address)->email)->first()->toArray();

        $output = '<!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="utf-8">
                <title>Example 2</title>
                <style>
                    @font-face {
                    font-family: SourceSansPro;
                    src: url(SourceSansPro-Regular.ttf);
                    }
                    .clearfix:after {
                    content: "";
                    display: table;
                    clear: both;
                    }
                    a {
                    color: #0087C3;
                    text-decoration: none;
                    }
                    body {
                    position: relative;
                    width: 21cm;  
                    height: 29.7cm; 
                    margin: 0 auto; 
                    color: #555555;
                    background: #FFFFFF; 
                    font-family: Arial, sans-serif; 
                    font-size: 14px; 
                    font-family: SourceSansPro;
                    }
                    header {
                    padding: 10px 0;
                    margin-bottom: 20px;
                    border-bottom: 1px solid #AAAAAA;
                    }
                    #logo {
                    float: left;
                    margin-top: 8px;
                    }
                    #logo img {
                    height: 70px;
                    }
                    #company {
                    float: right;
                    text-align: right;
                    }
                    #details {
                    margin-bottom: 50px;
                    }
                    #client {
                    padding-left: 6px;
                    border-left: 6px solid #0087C3;
                    float: left;
                    }
                    #client .to {
                    color: #777777;
                    }
                    h2.name {
                    font-size: 1.4em;
                    font-weight: normal;
                    margin: 0;
                    }
                    #invoice {
                    float: right;
                    text-align: right;
                    }
                    #invoice h1 {
                    color: #0087C3;
                    font-size: 2.4em;
                    line-height: 1em;
                    font-weight: normal;
                    margin: 0  0 10px 0;
                    }
                    #invoice .date {
                    font-size: 1.1em;
                    color: #777777;
                    }
                    table {
                    width: 100%;
                    border-collapse: collapse;
                    border-spacing: 0;
                    margin-bottom: 20px;
                    }
                    table th,
                    table td {
                    padding: 20px;
                    background: #EEEEEE;
                    text-align: center;
                    border-bottom: 1px solid #FFFFFF;
                    }
                    table th {
                    white-space: nowrap;        
                    font-weight: normal;
                    }
                    table td {
                    text-align: right;
                    }
                    table td h3{
                    color: #57B223;
                    font-size: 1.2em;
                    font-weight: normal;
                    margin: 0 0 0.2em 0;
                    }
                    table .no {
                    color: #FFFFFF;
                    font-size: 1.6em;
                    background: #57B223;
                    }
                    table .desc {
                    text-align: left;
                    }
                    table .unit {
                    background: #DDDDDD;
                    }
                    table .qty {
                    }
                    table .total {
                    background: #57B223;
                    color: #FFFFFF;
                    }
                    table td.unit,
                    table td.qty,
                    table td.total {
                    font-size: 1.2em;
                    }
                    table tbody tr:last-child td {
                    border: none;
                    }
                    table tfoot td {
                    padding: 10px 20px;
                    background: #FFFFFF;
                    border-bottom: none;
                    font-size: 1.2em;
                    white-space: nowrap; 
                    border-top: 1px solid #AAAAAA; 
                    }
                    table tfoot tr:first-child td {
                    border-top: none; 
                    }
                    table tfoot tr:last-child td {
                    color: #57B223;
                    font-size: 1.4em;
                    border-top: 1px solid #57B223; 
                    }
                    table tfoot tr td:first-child {
                    border: none;
                    }
                    #thanks{
                    font-size: 2em;
                    margin-bottom: 50px;
                    }
                    #notices{
                    padding-left: 6px;
                    border-left: 6px solid #0087C3;  
                    }
                    #notices .notice {
                    font-size: 1.2em;
                    }
                    footer {
                    color: #777777;
                    width: 100%;
                    height: 30px;
                    position: absolute;
                    bottom: 0;
                    border-top: 1px solid #AAAAAA;
                    padding: 8px 0;
                    text-align: center;
                    }              
                </style>
            </head>
            <body>
                <header class="clearfix">
                    <div id="logo">
                        <h1> ORDER INVOICE </h1>
                    </div>
                </header>
                <main>
                    <div id="details" class="clearfix">
                        <div id="client">
                            <div class="to">INVOICE TO:</div>
                            <h2 class="name">' . $customerDetails['first_name'] . '</h2>
                            <div class="address">' . $customerDetails['address'] . ',' . $customerDetails['city'] . ',' . $customerDetails['state'] . '</div>
                            <div class="address">' . $customerDetails['country'] . '-' . $customerDetails['zipcode'] . '</div>
                            <div class="email"><a href="mailto:' . $customerDetails['email'] . '">' . $customerDetails['email'] . '</a></div>
                        </div>
                        <div style="float:right">
                            <h1>Order ID ' . $orderDetails['order_code'] . '</h1>
                            <div class="date">Order Date:  ' . date('j F, Y, g:i a', strtotime($orderDetails['created_at'])) . '</div>
                            <div class="date">Order Amount: USD ' . $orderDetails['grand_total'] . '</div>
                            <div class="date">Order Status: ' . $orderDetails['order_status'] . '</div>
                            <div class="date">Payment Method: ' . $orderDetails['payment_method'] . '</div>
        
                        </div>
                    </div>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th class="unit">Product Code</th>
                                <th class="qty">Price</th>
                                <th class="qty">Qty</th>
                                <th class="total">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>';
        $subTotal = 0;
        foreach ($orderDetails['orders_products'] as $product) {
            $output .= '<tr>
                                    <td>' . $product['product_name'] . '</td>
                                    <td class="unit">' . $product['product_code'] . '</td>
                                    <td class="qty">' . $product['product_price'] . '</td>
                                    <td class="qty">' . $product['product_qty'] . '</td>
                                    <td class="total">USD ' . $product['product_price'] * $product['product_qty'] . '</td>
                                </tr>';
            $subTotal = $subTotal + ($product['product_price'] * $product['product_qty']);
        }
        $output .= '</tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">SUBTOTAL</td>
                                <td>USD ' . $subTotal . '</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Shipping Charges</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Coupon Discount</td>';
        if ($orderDetails['coupon_amount'] > 0) {
            $output .= '<td>USD ' . $orderDetails['coupon_amount'] . '</td>';
        } else {
            $output .= '<td>USD 0 </td>';
        }
        $output .= '</tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">GRAND TOTAL</td>
                                <td>USD ' . $orderDetails['grand_total'] . '</td>
                            </tr>
                        </tfoot>
                    </table>
                </main>
                <footer>
                    Invoice was created on a computer and is valid without the signature and seal.
                </footer>
            </body>
        </html>';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($output);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
        return view('admin.orders.order_invoice')->with(compact('orderDetails', 'customerDetails'));
    }

    public function deleteOrder($id)
    {
        Order::where('id', $id)->delete();
        $message = 'Order been deleted successfully';
        session()::flash('success_message', $message);
        return redirect()->back();
    }

    public function updateStatus(Request $request, $order_id)
    {
        $request->validate([
            'order_status' => 'required|string',
        ]);

        $order = Order::find($order_id);

        if (!$order) {
            session()->flash('error', 'Order not found.');
            return redirect()->back();
        }

        $order->update(['order_status' => $request->order_status]);

        if ($order->customer_id) {
            $customer = Customer::find($order->customer_id);
            if ($customer) {
                Mail::to($customer->email)->send(new OrderStatusUpdated($order));
            }
        } else {
            Mail::to($order->guest_email)->send(new OrderStatusUpdated($order));
        }

        session()->flash('success', 'Order status updated successfully.');

        return redirect()->back();
    }

    public function emailOrder(Request $request)
    {
        return view('admin.emails.order');
    }

    public function emailOrderStatus(Request $request)
    {
        return view('admin.emails.order_status');
    }
}
