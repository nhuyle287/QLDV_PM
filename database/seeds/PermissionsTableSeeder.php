<?php

use App\Model\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    const SCREEN = [
        'roles',
        'users',
        'departments',
        'units',
        'purposes',
        'customer',
        'products',
        'purchase_orders'
    ];
    const PERMISSIONS = [
        'access',
        'view',
        'create',
        'edit',
        'delete',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = self::PERMISSIONS;
        $screens = self::SCREEN;
        foreach ($screens as $screen) {
            foreach ($permissions as $per) {
                $permission = new Permission();
                $permission->title = $per;
                $permission->screen_name = $screen;
                $permission->save();
            }
        }
    }
}
