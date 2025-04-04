<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderRecords = [
            [
                 'id' => '5a60abea-b5b6-4aa4-ab8f-e6aafa0fd3cs', 'customer_id'=> 'afc11fde-9072-410b-be86-03a95265b20b', 'order_code' => 'ABCD1234', 'transaction_id' => 'YSHSLNSB134', 'amount' => '200.00', 'shipping_address' => 'test', 'billing_address' => 'test', 'shipping_cost' => '5.00', 'shipping_type' => 'test', 'shipping_charges' => '10.00', 'payment_type' => 'test', 'payment_gateway' => 'PayPal', 'courier_name' => 'test', 'tracking_number' => '1234567', 'order_date' => '2024-08-03 20:07:01', 'order_status'=> 'completed' ,
            ]
        ];

        Order::insert($orderRecords);
    }
}
