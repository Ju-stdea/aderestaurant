<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DeliveryAddress;

class DeliveryAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deliveryaddressRecords = [
            [
                 'id' => 'jfc11fde-9072-410b-be86-03a95265b202', 'user_id'=> 'afc11fde-9072-410b-be86-03a95265b20b', 'address_line' => '456 Elm St', 'country' => 'US', 'state' => 'Illinois', 'city' => 'Chicago', 'zipcode' => '60614'
            ]
        ];

        DeliveryAddress::insert($deliveryaddressRecords);
    }
}
