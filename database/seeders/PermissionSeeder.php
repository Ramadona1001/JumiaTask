<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=>'create_stations']);
        Permission::create(['name'=>'update_stations']);
        Permission::create(['name'=>'show_stations']);
        Permission::create(['name'=>'delete_stations']);
        Permission::create(['name'=>'create_roles']);
        Permission::create(['name'=>'update_roles']);
        Permission::create(['name'=>'show_roles']);
        Permission::create(['name'=>'delete_roles']);
        Permission::create(['name'=>'show_permissions']);
        Permission::create(['name'=>'assign_permissions']);
        Permission::create(['name'=>'create_trips']);
        Permission::create(['name'=>'update_trips']);
        Permission::create(['name'=>'show_trips']);
        Permission::create(['name'=>'delete_trips']);
        Permission::create(['name'=>'create_users']);
        Permission::create(['name'=>'update_users']);
        Permission::create(['name'=>'show_users']);
        Permission::create(['name'=>'delete_users']);
    }
}
