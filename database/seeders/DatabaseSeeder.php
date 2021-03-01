<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            ProfileTableSeeder::class,
            DashboardTableSeeder::class,
 			CategoriesTableSeeder::class,
 			ProductFamiliesTableSeeder::class,
 			ProductsTableSeeder::class,
 			RelatedProductsTableSeeder::class,
 			RealizationsTableSeeder::class,
 			ProductPhotosTableSeeder::class
 			// new seeder
        ]);
        $admin = Role::findByName('admin');
        $admin->givePermissionTo(Permission::all());
    }
}
