<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrdersProduct;

class OrderProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderProductRecords = [
            [
                 'id' => '8a60abea-b5b6-4aa4-ab8f-f6aafa0fd3cb', 'order_id' => '5a60abea-b5b6-4aa4-ab8f-e6aafa0fd3cs', 'customer_id'=> 'afc11fde-9072-410b-be86-03a95265b20b', 'product_id' => '14b85b9a-64h8-49f4-8244-667300ab130a', 'product_code' => 'AC13', 'product_name' => 'Village Fresh Herbal', 'product_price' => '100', 'product_qty' =>'2', 'product_total' => '1000'
            ]
        ];

        OrdersProduct::insert($orderProductRecords);
    }
}
