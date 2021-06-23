<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function getAllPost(){
        $posts = DB::table('posts')->get();
        return view('posts',compact('posts'));
    }

    public function addPost(){
        return view('add-post');
    }
    public function submitPost(Request $request){
        DB::table('posts')->insert([
            'title' => $request->title,
            'body' => $request->body
        ]);

    }
}
