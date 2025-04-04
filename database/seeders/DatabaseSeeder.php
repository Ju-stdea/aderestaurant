<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            CustomerSeeder::class,
            RolesAndPermissionsSeeder::class,
            AdminSuperadminSeeder::class,
            CategoryTableSeeder::class,
            ProductTableSeeder::class, 
            // OrderTableSeeder::class,
            // OrderProductsTableSeeder::class,
            CategoryAssetTableSeeder::class,
            BannerTableSeeder::class,
            // DeliveryAddressTableSeeder::class,
            StoreSeeder::class,
            // CountryStateCityTableSeeder::class
            // User::factory(10)->create();
        ]);
    }
}
