<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($name = null){
        return 'The name of homecontroller is '.$name;
    }
}
