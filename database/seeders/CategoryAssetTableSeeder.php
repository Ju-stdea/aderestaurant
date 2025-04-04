<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryAsset;

class CategoryAssetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            [
                'id'=> '3s60abea-b5b6-4aa4-ab8f-e6aafa0fd3cj', 
                'name' => 'Beauty & Care',
                'color_id' => '',
                'color_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677097/beauty_and_personal_care_ewkwqt.jpg',
                'dark_id' => '',
                'dark_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677097/beauty_and_personal_care_ewkwqt.jpg',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => '1c40abea-b5b6-4aa4-ab8f-e6aafa0fd3cs',
                'name' => 'Clothing',
                'color_id' => '',
                'color_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677091/updated_clothing_bnhmv8.png',
                'dark_id' => '',
                'dark_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677091/updated_clothing_bnhmv8.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => '1c60abea-b5b6-4aa4-ab8f-e6aafa0fd3cw', 
                'name' => 'Beverage',
                'color_id' => '',
                'color_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677090/updated_beverage_jo3zrx.png',
                'dark_id' => '',
                'dark_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677090/updated_beverage_jo3zrx.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => '1c60abea-b5b6-4aa4-ab8f-e6aafa0fd338', 
                'name' => 'Food & Groceries',
                'color_id' => '',
                'color_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677050/other_grocery_yuxrxl.jpg',
                'dark_id' => '',
                'dark_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677050/other_grocery_yuxrxl.jpg',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => '1c60abea-b5b6-4aa4-ab8f-e6aafaa7d3cs', 
                'name' => 'Home & Garden',
                'color_id' => '',
            'color_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677065/home_and_garden_fhie9z.webp',
                'dark_id' => '',
                'dark_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677065/home_and_garden_fhie9z.webp',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => '1c60abea-b5b6-4aa4-ab8f-e6aaaa0fd3cs', 
                'name' => 'Others',
                'color_id' => '',
                'color_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677047/food_grocery_wwtmsh.jpg',
                'dark_id' => '',
                'dark_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677047/food_grocery_wwtmsh.jpg',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
        ];

        CategoryAsset::insert($records);
    }
}
