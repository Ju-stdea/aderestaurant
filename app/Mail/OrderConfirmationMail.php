<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\Shipment;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Log;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $orderId;
    public $order;

    /**
     * Create a new message instance.
     *
     * @param  int  $orderId
     * @return void
     */
    public function __construct($orderId)
    {
        $this->orderId = $orderId;
        $this->order = Order::with('orders_products')->find($this->orderId);

        if (!$this->order) {
            throw new \Exception("Order not found");
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $orderDate = is_string($this->order->order_date)
            ? Carbon::parse($this->order->order_date)
            : $this->order->order_date;

        $billingAddress = json_decode($this->order->billing_address);
        $shippingAddress = json_decode($this->order->shipping_address);

        $this->order->customer_name = $billingAddress->firstname . ' ' . $billingAddress->lastname;

        $this->order->orders_products = $this->order->orders_products->map(function ($orderProduct) {
            return [
                'product_image' => $orderProduct->product->image_url,
                'product_name' => $orderProduct->product->product_name,
                'quantity' => $orderProduct->product_qty,
                'price' => number_format($orderProduct->product_price, 2),
                'total' => number_format($orderProduct->product_qty * $orderProduct->product_price, 2)
            ];
        });

        $shipment = Shipment::where('order_id', $this->orderId)->first();

        return $this->view('emails.order-confirmation')
            ->with([
                'orderNumber' => $this->order->order_code,
                'orderDate' => $orderDate->format('M d, Y'),
                'orderTotal' => number_format($this->order->grand_total, 2),
                'shippingAddress' => $shippingAddress,
                'customerName' => $this->order->customer_name,
                'orderItems' => $this->order->orders_products,
                'subtotal' => number_format($this->order->sub_total_amount, 2),
                'shippingCost' => number_format($this->order->ups_shipping_charges, 2),
                // 'tips' => number_format($this->order->tips, 2),
                'shipment' => "https://www.ups.com/WebTracking/track?trackNums={{ $shipment->tracking_number }}",
                "trackingNumber" => $shipment->tracking_number,
                'companyName' => env('COMPANY_NAME'),
                'companyAddress' => env('UPS_SHIPPER_STREET') . ' ' . env('UPS_SHIPPER_CITY') . ', ' . env('UPS_SHIPPER_STATE') . ' ' . env('UPS_SHIPPER_COUNTRY'),
                'companyPhone' => env('UPS_SHIPPER_PHONE'),
            ]);
    }
}
