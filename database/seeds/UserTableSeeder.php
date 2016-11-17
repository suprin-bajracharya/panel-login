<?php

use Illuminate\Database\Seeder; 
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
        $role_superAdmin = Role::where('name', 'SuperAdmin')->first();
        $role_admin = Role::where('name', 'Admin')->first();        

        $user = new User();
        $user->Name = 'Victor';
        $user->Email = 'visitor@example.com';
        $user->Password = bcrypt('visitor');
        $user->save();
        $user->roles()->attach($role_user);

        $admin = new User();
        $admin->Name = 'Mark';
        $admin->Email = 'admin@admin.com';
        $admin->Password = bcrypt('admin123');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $super_admin = new User();
        $super_admin->Name = 'Kakashi';
        $super_admin->Email = 'sadmin@sadmin.com';
        $super_admin->Password = bcrypt('superadmin');
        $super_admin->save();
        $super_admin->roles()->attach($role_superAdmin);

    }
}
