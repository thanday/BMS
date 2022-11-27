<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // \App\Models\User::factory(10)->create();
        $admin_role = Role::create(['name' => 'super-admin']);

        $admin = User::create([
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => bcrypt('password'),
            'remember_token' => null,
            'role' => 'super-admin',
        ]);
        $admin->assignRole($admin_role);


        $user_role = Role::create(['name' => 'user']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'technician']);
        Role::create(['name' => 'marketing']);
        Role::create(['name' => 'manager']);

        $user = User::create([
            'name'           => 'User',
            'email'          => 'user@user.com',
            'password'       => bcrypt('password'),
            'remember_token' => null,
            'role' => 'user',
        ]);
        $user->assignRole($user_role);

        Permission::create(['name' => 'add event']);
        Permission::create(['name' => 'view event']);
        Permission::create(['name' => 'edit event']);
        Permission::create(['name' => 'delete event']);
        Permission::create(['name' => 'add channel']);
        Permission::create(['name' => 'view channel']);
        Permission::create(['name' => 'edit channel']);
        Permission::create(['name' => 'delete channel']);
        Permission::create(['name' => 'view report']);
        Permission::create(['name' => 'view tech report']);
        Permission::create(['name' => 'export report']);
        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'assign_role_to_user']);
        Permission::create(['name' => 'assign direct permision to user']);
        Permission::create(['name' => 'revoke_role_on_user']);
        Permission::create(['name' => 'assign_tech_to_event']);
        Permission::create(['name' => 'add_link_log']);
        Permission::create(['name' => 'view_tech_info_on_channel_detailview']);
        Permission::create(['name' => 'add role']);
        Permission::create(['name' => 'edit role']);
        Permission::create(['name' => 'delete role']);
        Permission::create(['name' => 'assign_permission_to_role']);
        Permission::create(['name' => 'search role']);
        Permission::create(['name' => 'add permission']);
        Permission::create(['name' => 'edit permission']);
        Permission::create(['name' => 'delete permission']);
        Permission::create(['name' => 'view dashboard nav']);
        Permission::create(['name' => 'view events nav']);
        Permission::create(['name' => 'view channels nav']);
        Permission::create(['name' => 'view reports nav']);
        Permission::create(['name' => 'view users nav']);
        Permission::create(['name' => 'view roles nav']);
        Permission::create(['name' => 'view permission nav']);   
        Permission::create(['name' => 'view upcomming event nav']);


      //   $admin_role->givePermissionTo($permission);

    }
}
