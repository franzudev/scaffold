<?php

namespace Database\Seeders;

use DB;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Module
        $moduleId = DB::table('modules')->insertGetId([
            'name' => 'profile',
            'display_name' => 'Profilo',
            'icon' => 'icon-user',
            'active' => false
        ]);

        // Permissions
        DB::table('permissions')->insert([
            [
                'name' => 'read-profile',
                'display_name' => 'Lettura Profilo',
                'guard_name' => 'web',
                'module_id' => $moduleId
            ],
            [
                'name' => 'update-profile',
                'display_name' => 'Modifica Profilo',
                'guard_name' => 'web',
                'module_id' => $moduleId
            ],
            [
                'name' => 'read-profile-password',
                'display_name' => 'Lettura Password',
                'guard_name' => 'web',
                'module_id' => $moduleId
            ],
            [
                'name' => 'update-profile-password',
                'display_name' => 'Modifica Password',
                'guard_name' => 'web',
                'module_id' => $moduleId
            ]
        ]);


        // Assign permissions to user role
        $user = Role::findByName('user');
        $user->givePermissionTo('read-profile', 'update-profile', 'read-profile-password', 'update-profile-password');

    }
}
