<?php

namespace App\Http\Controllers;

use App\Models\Postapi;
use Illuminate\Http\Request;

class PostapiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Postapi::paginate(10);

        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Postapi();
        $post->title = $request->title;
        $post->body = $request->body;
        if ($post->save()) {
            return 'inserted successfully';
        } else {
            return 'something is wrong';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Postapi $postapi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Postapi::find($id);
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Postapi $postapi
     * @return \Illuminate\Http\Response
     */
    public function edit(Postapi $postapi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Postapi $postapi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Postapi::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        if ($post->save()) {
            return 'updated successfully';
        } else {
            return 'something is wrong';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Postapi $postapi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Postapi::findOrFail($id);
        if($post->delete()){
            return 'deleted successfully';
        }
        else{
            return 'something is wrong';
        }
    }
}
