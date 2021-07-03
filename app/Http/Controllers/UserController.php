<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\User;
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

    public function insertRecord(){
        $phone = new Phone();
        $phone->name = 'Samsung';
        $phone->phone = '01982945353';
        $user = new User();
        $user->name = 'Selim';
        $user->email = 'selimreza@gmail.com';
        $user->password = encrypt('secret');
        $user->save();
        $user->phone()->save($phone);
        return 'user added successfully';
    }
    public function fetchPhoneByUser($id){
        $phone = User::find($id)->phone;
        return $phone;
    }


}
