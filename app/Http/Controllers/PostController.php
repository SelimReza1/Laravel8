<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        return back()->with('post_created','post has been created successfully!');

    }
    public function getPostById($id){
        $post =  DB::table('posts')->where('id',$id)->first();
        return view('single-post', compact('post'));
    }

    public function editPost($id){
        $post = DB::table('posts')->where('id',$id)->first();
        return view('edit-post', compact('post'));
    }
    public function updatePost(Request $request){
        $post = DB::table('posts')->where('id',$request->id)->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return back()->with('post_updated', 'Your post has been updated successfully');
    }

    public function deletePost($id){
        $post =DB::table('posts')->where('id',$id)->delete();
        return back()->with('post_deleted','post has been deleted successfully');
    }

    public function innerJoin(){
        $request = DB::table('posts')
            ->join('users', 'users.id','posts.user_id')
            ->select('users.name','posts.title','posts.body')
            ->get();
            return $request;
    }

    public function leftJoin(){
        $result = DB::table('posts')
            ->leftJoin('users','users.id','posts.user_id')
            ->get();
        return $result;
    }

    public function rightJoin(){
        $result = DB::table('posts')
            ->rightJoin('users','users.id','posts.user_id')
            ->get();
        return $result;
    }

    public function getAllPostByModel(){
        $posts = Post::all();
        return $posts;
    }
}
