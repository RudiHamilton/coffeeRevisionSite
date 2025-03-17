<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions for rooms
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'delete users']);

        // create permissions for bookings
        Permission::create(['name' => 'view leaderboard']);
        Permission::create(['name' => 'edit leaderboard']);
        Permission::create(['name' => 'create leaderboard']);
        Permission::create(['name' => 'delete leaderboard']);

        //create permissions for users 
        Permission::create(['name' => 'view activities']);

        Permission::create(['name'=> 'role control']);
        Permission::create(['name'=> 'permission control']);

        // update cache to know about the newly created permissions (required if using WithoutModelEvents in seeders)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        // create roles and assign created permissions
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'staff'])
            ->givePermissionTo(['view activities', 'view users','edit users', 'view leaderboard', 'edit leaderboard']);

        $role = Role::create(['name' => 'user'])
            ->givePermissionTo(['view leaderboard', 'view activities']);

        //PLEASE REMOVE
        $superAdminUser = User::find(1); 

        $superAdminUser->assignRole('super-admin');

        $staff = User::find(2);
        $staff->assignRole('staff');

        $user = User::find(3);
        $user->assignRole('user');
    }
}
