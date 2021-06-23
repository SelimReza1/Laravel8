<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function loginSubmit(Request $request){
       $validData = $request->validate([
          'email' => 'required|email',
          'password' => 'required|min:6|max:8'
       ]);
        $email = $request->input('email');
        $password = $request->input('password');

        echo 'email is: '.$email.'<br> Password is: '.$password;
    }
}
