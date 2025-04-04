<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                // 'id' => Str::uuid(),
                'id' => 'afc11fde-9072-410b-be86-03a95265b20b',
                'first_name' => 'Hammed',
                'last_name' => 'Adeleke',
                'middle_name' => 'Lekan',
                'email' => 'webxpartt@gmail.com',
                'password' => Hash::make('12345678'),
                'profile_image' => null,
                'address' => '123 Main St',
                'zipcode' => '90001',
                'mobile' => '1234567890',
                'status' => 'ACTIVE',
                'terms_agreed' => true,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}