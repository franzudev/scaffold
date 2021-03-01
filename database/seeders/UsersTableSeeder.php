<?php

namespace Database\Seeders;

use App\Http\Helpers\Initials;
use Avatar;
use DB;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Storage;

class UsersTableSeeder extends Seeder
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
            'name' => 'users',
            'display_name' => 'Utenti',
            'icon' => 'icon-people'
        ]);

        // Permissions
        DB::table('permissions')->insert([
            [
                'name' => 'read-users',
                'display_name' => 'Lettura',
                'guard_name' => 'web',
                'module_id' => $moduleId
            ],
            [
                'name' => 'create-users',
                'display_name' => 'Creazione',
                'guard_name' => 'web',
                'module_id' => $moduleId
            ],
            [
                'name' => 'update-users',
                'display_name' => 'Modifica',
                'guard_name' => 'web',
                'module_id' => $moduleId
            ],
            [
                'name' => 'delete-users',
                'display_name' => 'Eliminazione',
                'guard_name' => 'web',
                'module_id' => $moduleId
            ]
        ]);

        // Create default user
        $user = \App\Models\User::create([
            'username' => 'admin',
            'name' => 'amministratore',
            'surname' => 'amministratore',
            'email' => 'admin@sponsio.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'phone' => '348293843',
            'residence' => 'Perugia',
            'feedback' => 1,
            'avatar' => 'avatar.png',
            'birth_date' => \Carbon\Carbon::now()
        ]);


        // Assign admin role to default user
        $user->assignRole('admin');
        // Generate avatar to defautl user
        $avatar = Avatar::create(Initials::generate($user->username))->getImageObject()->encode('png');
        Storage::put('avatars/' . $user->id . '/avatar.png', (string) $avatar);

        \App\Models\User::factory()->count(1)->create()->each(function($user) {
            $user->assignRole('user');
            $avatar = Avatar::create(Initials::generate($user->username))->getImageObject()->encode('png');
            Storage::put('avatars/' . $user->id . '/avatar.png', (string) $avatar);
        });
    }
}
