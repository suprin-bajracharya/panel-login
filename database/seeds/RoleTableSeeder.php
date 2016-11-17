<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_user = new Role();
        $role_user->name = 'User';
        $role_user->description = 'A normal user';
        $role_user->save();

        $role_superAdmin = new Role();
        $role_superAdmin->name = 'SuperAdmin';
        $role_superAdmin->description = 'A super admin';
        $role_superAdmin->save();

        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'An admin user';
        $role_admin->save();
    }
}
