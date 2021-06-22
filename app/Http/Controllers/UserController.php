<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = [
            'name' => 'Selim',
            'age' => '25',
            'email' => 'selimreza9920@gmail.com'
        ];
        return view('user',compact('users'));
    }
}
