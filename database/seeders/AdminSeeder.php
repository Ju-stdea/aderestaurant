<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed the admins table
        $adminRecords =[
            [
                'id' => Str::uuid(),
                'first_name' => 'Hammed',
                'last_name' => 'Adeleke',
                'mobile' => '1234567890',
                'email' => 'joshuaadeyemi445@gmail.com',
                'password' => Hash::make('12345678'),
                'status' => 'ACTIVE',
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                'id' => Str::uuid(),
                'first_name' => 'Amras',
                'last_name' => 'Grocery',
                'mobile' => '773-996-2287',
                'email' => 'jhabisfjhabisfoodmart@gmail.com',
                'password' => Hash::make('Bokiana85$'),
                'status' => 'ACTIVE',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
      DB::table('admins')->insert($adminRecords);
    }
}
