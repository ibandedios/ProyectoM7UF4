<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Roles;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ChangePassActionController extends Controller
{
    protected function index(string $data)
    {
        $password = 
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 2
        ]);
        

        $user->roles()->attach(Roles::where('rol', 'user')->first());
        return $user;
    }
}
