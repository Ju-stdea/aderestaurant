<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryRecords = [
            
            [
                'category_name'=> 'Beverage', 
                'id' => '1c60abea-b5a6-4aa4-ab8f-e8aafa0fd3cs', 
                'slug'=> 'beverage',
                'image_url' => '', 
                'asset_image_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677090/updated_beverage_jo3zrx.png',
                'description'=> 'Different varieties of beverage items',
                'is_cover' => false,
                'status'=> 'ACTIVE'
            ],
            [
                'category_name'=> 'Clothing', 
                'id' => '1c69abea-b8b6-4aa4-ab8f-e8aafa0fd3cs', 
                'slug'=> 'clothing',
                'image_url' => '', 
                'asset_image_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677091/updated_clothing_bnhmv8.png',
                'description'=> 'Different varieties of clothing',
                'is_cover' => false,
                'status'=> 'ACTIVE'
            ],
            [
                'category_name'=> 'Beauty & Personal Care', 
                'id' => '1c60abea-b5b9-4aa4-ab8f-e8aafa0fd3cs', 
                'slug'=> 'beauty and personal care',
                'image_url' => '', 
                'asset_image_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677097/beauty_and_personal_care_ewkwqt.jpg',
                'description'=> 'Different varieties of beauty and personal care',
                'is_cover' => false,
                'status'=> 'ACTIVE'
            ],
            [
                'category_name'=> 'Food & Groceries', 
                'id' => '1c60abea-b5b6-4a94-ab7f-e8aafa1fd3cs', 
                'slug'=> 'food and groceries',
                'image_url' => '', 
                'asset_image_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677050/other_grocery_yuxrxl.jpg',
                'description'=> 'Different varieties of beverage items',
                'is_cover' => false,
                'status'=> 'ACTIVE'
            ],
            [
                'category_name'=> 'Home and Garden', 
                'id' => '1c6089ea-b5b6-4bs4-ab8f-e8aafa0fd3cs', 
                'slug'=> 'home and garden',
                'image_url' => '', 
                'asset_image_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677065/home_and_garden_fhie9z.webp',
                'description'=> 'Different varieties of home and garden',
                'is_cover' => false,
                'status'=> 'ACTIVE'
            ],
            [
                'category_name'=> 'Other', 
                'id' => '1c80abea-b5b6-4aa4-ab8f-e8safa0fd3cs', 
                'slug'=> 'other',
                'image_url' => '', 
                'asset_image_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677047/food_grocery_wwtmsh.jpg',
                'description'=> 'All Other Items',
                'is_cover' => false,
                'status'=> 'ACTIVE'
            ],
            // [
            //     'category_name'=> 'Fruits', 
            //     'id' => '1c60abea-b5b6-4aa4-ab8f-e6aafa0fd3sh', 
            //     'slug'=> 'fruits',
            //     'description'=> 'Healthy & Goods',
            //     'image_url'=>'https://res.cloudinary.com/doeoa6jzb/image/upload/v1722851803/cover-category-1_uwapwk.webp',
            //     'asset_image_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1722850314/c-fruits_nii3y8.webp',
            //     'is_cover' => true, 
            //     'status'=> 'ACTIVE'
            // ],
            // [
            //     'category_name'=> 'Vegetable', 
            //     'id' => '1c60abea-b5b6-4aa4-ab8f-e6aafa0fs3cs', 
            //     'slug'=> 'vegetable',
            //     'description'=> 'Different varieties of vegetable items',
            //     'image_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1722851802/cover-category-2_ijctqk.webp', 
            //     'asset_image_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1722850320/c-vegetables_d7prng.webp',
            //     'is_cover' => true, 
            //     'status'=> 'ACTIVE'
            // ],
            // [
            //     'category_name'=> 'Juice', 
            //     'id' => '1c60abea-b5b6-4aa4-ab8f-e6aafa0fd8cs', 
            //     'slug'=> 'juice', 
            //     'description'=> 'Different varieties of juice items',
            //     'asset_image_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1722850318/c-juice_d69yqq.webp', 
            //     'image_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1722851806/cover-category-3_z1kkfq.webp',
            //     'is_cover' => true, 
            //     'status'=> 'ACTIVE'
            // ],
            // [
            //     'category_name'=> 'Meat', 
            //     'id' => '1c60abea-b5b6-4aa4-ab8f-e6anfa0fd3cs', 
            //     'slug'=> 'meat',
            //     'description'=> 'Different varieties of meat items',
            //     'image_url' => '', 
            //     'asset_image_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1722850317/c-meat_mxgdxr.webp', 
            //     'is_cover' => false,
            //     'status'=> 'ACTIVE'
            // ],
            // [
            //     'category_name'=> 'Cold Drinks', 
            //     'id' => '1c60abea-b5b6-4aa4-ab8f-e7aafa0fd3cs', 
            //     'slug'=> 'cold drinks',
            //     'image_url' => '', 
            //     'asset_image_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1722850316/c-cold_drinks_tceaxi.webp', 
            //     'description'=> 'Different varieties of fruit items',
            //     'is_cover' => false,
            //     'status'=> 'ACTIVE'
            // ],
            // [
            //     'category_name'=> 'Bread', 
            //     'id' => '1c60abea-b5b6-4aa4-ab8f-e8aafa0fd3cs', 
            //     'slug'=> 'bread',
            //     'image_url' => '', 
            //     'asset_image_url' => 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1722850314/c-breads_uuholx.webp',
            //     'description'=> 'Different varieties of bread items',
            //     'is_cover' => false,
            //     'status'=> 'ACTIVE'
            // ]
        ];

        Category::insert($categoryRecords);
    }
}
