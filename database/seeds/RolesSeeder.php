<?php

use Illuminate\Database\Seeder;
use App\Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $rol= new Roles();
        $rol->rol= 'admin';
        $rol->desc = 'Administrator';
        $rol->save();
        $rol = new Roles();
        $rol->rol= 'user';
        $rol->desc = 'User';
        $rol->save();

    }
}
