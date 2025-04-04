<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminOrderNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $customerName;
    public $orderItems;
    public $billingAddress;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;

        $this->billingAddress = json_decode($order->billing_address);
        
        $this->customerName = $this->billingAddress->firstname . ' ' . $this->billingAddress->lastname;
        
        $this->orderItems = $order->orders_products->map(function ($item) {
            return [
                'product_image' => $item->product->image_url,
                'product_name' => $item->product->product_name,
                'quantity' => $item->product_qty,
                'price' => number_format($item->product_price, 2),
                'total' => number_format($item->product_qty * $item->product_price, 2)
            ];
        });
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Order Placed: #' . $this->order->order_code)
            ->view('emails.order-placed-admin')
            ->with([
                'orderNumber' => $this->order->order_code,
                'orderDate' => $this->order->created_at->format('M d, Y H:i'),
                'orderTotal' => number_format($this->order->grand_total, 2),
                'customerName' => $this->customerName,
                'orderItems' => $this->orderItems,
                'tips' => number_format($this->order->tips, 2),
                'subtotal' => number_format($this->order->sub_total_amount, 2),
                'shippingCost' => number_format($this->order->ups_shipping_charges, 2),
                'deliveryMethod' => $this->order->delivery_method,
                'companyName' => env('COMPANY_NAME'),
                'companyPhone' => env('UPS_SHIPPER_PHONE'),
                'companyAddress' => env('UPS_SHIPPER_STREET') . ' ' . env('UPS_SHIPPER_CITY') . ', ' . env('UPS_SHIPPER_STATE') . ' ' . env('UPS_SHIPPER_COUNTRY'),
            ]);
    }
}
