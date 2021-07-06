<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
    $teachers = Teacher::all();
    return view('all-teachers',compact('teachers'));
    }
    public function create(){
        return view('add-teacher');
    }
    public function store(Request $request){
        $teacher = new Teacher();
        $teacher->name = $request->name;
        if($image = $request->file('file')){
        $destination = public_path('images');
        $imagName = time().".".$image->extension();
        $image->move($destination, $imagName);
        $teacher->profileImage = $imagName;
        }

        $teacher->save();
        return back()->with('teacher_added', 'teacher has been added successfully');
    }
    public function edit($id){
        $teacher = Teacher::find($id);
        return view('edit-teacher',compact('teacher'));
    }

    public function update(Request $request){
        $teacher = Teacher::find($request->id);
        $teacher->name = $request->name;
        if($image = $request->file('file')){

        $destination = public_path('images');
        $imagName = time().".".$image->extension();
        $image->move($destination, $imagName);

        $teacher->profileImage = $imagName;
        }else{
            unset($teacher->profileImage);
        }
        $teacher->update();

        return back()->with('teacher_updated', 'teacher has been updated successfully');
    }

    public function destroy($id){
        $teacher =Teacher::find($id);
        unlink(public_path('images').'/'.$teacher->profileImage);
        $teacher->delete();
        return back()->with('teacher_deleted','teacher has been deleted successfully');
    }

}
