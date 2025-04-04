<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bannerRecords = [
            [
                'id' => '4c60abea-b5b6-4aa4-ab8f-e6aafa0fd3ss',
                'image_url'=> 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726157295/amrasgrocery/banners/fvvusenrl6iahdol2opi.jpg', 
                'title' => 'FRESH GROCERY',
                'alt' => "There you can Buy your all of Grocery Products",
                'status'=> 'ACTIVE'
            ],
            [
                'id' => '6a60abea-b5b6-4aa4-ab8f-e6aafa0fd3ss',
                'image_url'=> 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1728226946/grocery-image_vopvx5.png', 
                'title' => 'FRESH GROCERY',
                'alt' => "We Provide Fresh Items To Your Door Steps",
                'status'=> 'ACTIVE'
            ],
            [
                'id' => '5b60abea-b5b6-4aa4-ab8f-e6aafa0fd3ss',
                'image_url'=> 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1723366013/banner-3_ahzyea.webp', 
                'title' => 'FRESH GROCERY',
                'alt' => "You Can Buy All the Grocery Items",
                'status'=> 'ACTIVE'
            ],
            // [
            //     'id' => '4c60abea-b5b6-4aa4-ab8f-e6aafa0fd3ss',
            //     'image_url'=> 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1723366012/banner-1_ceswqj.webp', 
            //     'title' => 'FRESH GROCERY',
            //     'alt' => "There you can Buy your all of Grocery Products",
            //     'status'=> 'ACTIVE'
            // ],
          
        ];
        Banner::insert($bannerRecords);
    }
}
