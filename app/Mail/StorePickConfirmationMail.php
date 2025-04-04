<?php

namespace App\Mail;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StorePickConfirmationMail extends Mailable
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


        return $this->view('emails.store-pick-confirmation')
            ->with([
                'orderNumber' => $this->order->order_code,
                'orderDate' => $orderDate->format('M d, Y'),
                'orderTotal' => number_format($this->order->grand_total, 2),
                'billingAddress' => $billingAddress,
                'customerName' => $this->order->customer_name,
                'orderItems' => $this->order->orders_products,
                'subtotal' => number_format($this->order->sub_total_amount, 2),
                'tips' => number_format($this->order->tips, 2),
                'storeLocation' => "https://www.google.com/maps/search/?api=1&query=" . urlencode(env('UPS_SHIPPER_STREET') . ' ' . env('UPS_SHIPPER_CITY') . ', ' . env('UPS_SHIPPER_STATE') . ' ' . env('UPS_SHIPPER_COUNTRY')),
                'companyName' => env('COMPANY_NAME'),
                'companyAddress' => env('UPS_SHIPPER_STREET') . ' ' . env('UPS_SHIPPER_CITY') . ', ' . env('UPS_SHIPPER_STATE') . ' ' . env('UPS_SHIPPER_COUNTRY'),
                'companyPhone' => env('UPS_SHIPPER_PHONE'),
            ]);
    }
}
