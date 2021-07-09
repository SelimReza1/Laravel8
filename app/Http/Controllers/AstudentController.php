<?php

namespace App\Http\Controllers;

use App\Models\Astudent;
use Illuminate\Http\Request;

class AstudentController extends Controller
{
    public function index(){
        $astudents = Astudent::orderBy('id', 'DESC')->get();
        return view('astudents', compact('astudents'));
    }

    public function addStudent(Request $request){
        $astudent = new Astudent();
        $astudent->firstname = $request->firstname;
        $astudent->lastname = $request->lastname;
        $astudent->email = $request->email;
        $astudent->phone = $request->phone;
        $astudent->save();

        return response()->json($astudent);
    }

    public function getStudentById($id){
        $astudent = Astudent::find($id);
        return response()->json($astudent);
    }

    public function updateStudent(Request $request){
        $astudent = Astudent::find($request->id);
        $astudent->firstname = $request->firstname;
        $astudent->lastname = $request->lastname;
        $astudent->email = $request->email;
        $astudent->phone = $request->phone;
        $astudent->save();
        return response()->json($astudent);
    }
}
