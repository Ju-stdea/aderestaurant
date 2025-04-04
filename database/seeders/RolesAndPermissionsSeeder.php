<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Admin;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        $this->seedRoles();
        $this->seedPermissions();
        $this->assignRolesToDefaultAdmin();
        $this->assignDeveloperRoleToSpecificAdmin(); 
    }

    private function seedRoles()
    {
        $roles = [
            'super admin',
            'admin',
            'manager',
            'customer support',
            'sales',
            'inventory manager',
            'developer'
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['name' => $role],
                ['id' => Str::uuid()]
            );
        }
    }

    private function seedPermissions()
    {
        $permissions = [
            ['name' => 'categories::view', 'description' => 'View categories'],
            ['name' => 'categories::edit', 'description' => 'Edit categories'],
            ['name' => 'categories::full', 'description' => 'Full access to categories'],
            ['name' => 'products::view', 'description' => 'View products'],
            ['name' => 'products::edit', 'description' => 'Edit products'],
            ['name' => 'products::full', 'description' => 'Full access to products'],
            ['name' => 'coupons::view', 'description' => 'View coupons'],
            ['name' => 'coupons::edit', 'description' => 'Edit coupons'],
            ['name' => 'coupons::full', 'description' => 'Full access to coupons'],
            ['name' => 'orders::view', 'description' => 'View orders'],
            ['name' => 'orders::edit', 'description' => 'Edit orders'],
            ['name' => 'orders::full', 'description' => 'Full access to orders'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                ['id' => Str::uuid(), 'description' => $permission['description']]
            );
        }
    }

    private function assignRolesToDefaultAdmin()
    {
        $defaultAdmin = Admin::first();
        if ($defaultAdmin) {
            $superadminRole = Role::where('name', 'super admin')->first();
            if ($superadminRole) {
                DB::table('admin_role')->updateOrInsert(
                    [
                        'admin_id' => $defaultAdmin->id,
                        'role_id' => $superadminRole->id,
                    ]
                );

                $allPermissions = Permission::all();
                foreach ($allPermissions as $permission) {
                    DB::table('admin_role_permission')->updateOrInsert(
                        [
                            'admin_id' => $defaultAdmin->id,
                            'role_id' => $superadminRole->id,
                            'permission_id' => $permission->id,
                        ]
                    );
                }
            }
        }
    }

    private function assignDeveloperRoleToSpecificAdmin()
    {
        $admin = Admin::where('email', 'lekhad19@gmail.com')->first();

        if ($admin) {
            $developerRole = Role::where('name', 'developer')->first();
            if ($developerRole) {
                DB::table('admin_role')->updateOrInsert(
                    [
                        'admin_id' => $admin->id,
                        'role_id' => $developerRole->id,
                    ]
                );
            }
        }
    }
}
