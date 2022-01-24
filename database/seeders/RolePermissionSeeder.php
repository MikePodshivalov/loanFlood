<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'km_main']);
        Role::create(['name' => 'km']);
        Role::create(['name' => 'ukk_main']);
        Role::create(['name' => 'ukk']);
        Role::create(['name' => 'pd_main']);
        Role::create(['name' => 'pd']);
        Role::create(['name' => 'iab_main']);
        Role::create(['name' => 'iab']);
        Role::create(['name' => 'zs_main']);
        Role::create(['name' => 'zs']);
        Role::create(['name' => 'ukam_main']);
        Role::create(['name' => 'ukam']);
        Permission::create(['name' => 'create loan']);
        Permission::create(['name' => 'edit loan']);
    }
}
