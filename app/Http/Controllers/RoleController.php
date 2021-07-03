<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function addRole(){
        $roles = [
            ['name' => 'Administrator'],
            ['name' => 'Editor'],
            ['name' => 'Author'],
            ['name' => 'Contributor'],
            ['name' => 'Subscriber']
        ];
        Role::insert($roles);
        return 'Roles are created successfully';
    }
    public function addUser(){
        $user = new User();
        $user->name = 'ALamin';
        $user->email = "alamin@gmail.com";
        $user->password = encrypt('secret');
        $user->save();

        $roleids = [2,4,5];
        $user->role()->attach($roleids);

        return 'record has been created successfully';

    }


    public function getAllUsesByRole($id){
        $role = Role::find($id);
        $users = $role->user;
        return $users;
    }
    public function getAllRoleByUsers($id){
        $user = User::find($id);
        $roles = $user->role;
        return $roles;
    }


}
