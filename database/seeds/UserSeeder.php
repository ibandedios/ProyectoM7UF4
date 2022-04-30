<?php

use Illuminate\Database\Seeder;
use App\Roles;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_user = Roles::where('rol', 'user')->first();
        $role_admin = Roles::where('rol', 'admin')->first();
        $user = new User();
        $user -> username = 'User';
        $user -> email = 'user@example.com';
        $user -> password = bcrypt('secret');
        $user -> role_id = 2;
        $user -> save();
        $user -> roles()->attach($role_user);
        $user = new User();
        $user -> username = 'Admin';
        $user -> email = 'admin@example.com';
        $user -> password = bcrypt('secret');
        $user -> role_id = 1;
        $user -> save();
        $user->roles()->attach($role_admin);

    }
}
