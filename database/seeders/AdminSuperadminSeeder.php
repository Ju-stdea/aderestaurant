<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class AdminSuperadminSeeder extends Seeder
{

    public function run(): void
    {
        /**
         * Run the database seeds.
         */

        $superadminRole = Role::where('name', 'superadmin')->first();

        $admin = Admin::where('email', 'superadmin@example.com')->first();

        if ($admin && $superadminRole) {
            // Use updateOrCreate to avoid duplicate entries
            $admin->roles()->updateOrCreate(
                ['role_id' => $superadminRole->id],
                ['admin_id' => $admin->id]
            );
        }
    }
}
