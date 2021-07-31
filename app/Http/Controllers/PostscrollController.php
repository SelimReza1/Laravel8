<?php

namespace App\Http\Controllers;

use App\Models\Postscroll;
use Illuminate\Http\Request;

class PostscrollController extends Controller
{
    public function index(Request $request){
        $posts = Postscroll::paginate(5);
        if($request->ajax()){
            $view = view('data', compact('posts'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('postscroll',compact('posts'));
    }
}
