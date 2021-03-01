<?php

namespace Database\Seeders;

use DB;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
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
            'name' => 'roles',
            'display_name' => 'Ruoli',
            'icon' => 'icon-key'
        ]);

        // Permissions
        DB::table('permissions')->insert([
            [
                'name' => 'read-roles',
                'display_name' => 'Lettura',
                'guard_name' => 'web',
                'module_id' => $moduleId
            ],
            [
                'name' => 'create-roles',
                'display_name' => 'Creazione',
                'guard_name' => 'web',
                'module_id' => $moduleId
            ],
            [
                'name' => 'update-roles',
                'display_name' => 'Modifica',
                'guard_name' => 'web',
                'module_id' => $moduleId
            ],
            [
                'name' => 'delete-roles',
                'display_name' => 'Eliminazione',
                'guard_name' => 'web',
                'module_id' => $moduleId
            ]
        ]);

        // Create default roles
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Admin'
        ]);
        $user = Role::create([
            'name' => 'user',
            'display_name' => 'User'
        ]);
    }
}
