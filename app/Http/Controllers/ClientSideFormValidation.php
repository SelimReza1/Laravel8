<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientSideFormValidation extends Controller
{
    public function index(){
    return view('clientside-formvalidation');
    }
    public function registersubmit(Request $request){
        return "form submitted successfully";
    }
}
