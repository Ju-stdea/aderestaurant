<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::create([
            'id' => (string) \Illuminate\Support\Str::uuid(),
            'name' => 'Amras Africa',
            'address' => '244 E 35th St',
            'city' => 'Chicago',
            'state' => 'IL',
            'postal_code' => '60616',
            'country' => 'US',
            'distance' => 0,
            'warehouse' => 'Amras Africa Grocery Store',
            'is_free' => true,
        ]);
    }
}
