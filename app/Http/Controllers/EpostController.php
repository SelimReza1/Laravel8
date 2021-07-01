<?php

namespace App\Http\Controllers;

use App\Models\Epost;
use Illuminate\Http\Request;

class EpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eposts = Epost::all();
        return view('eposts.index',compact('eposts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eposts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eposts = new Epost();
        $eposts->title = $request->title;
        $eposts->body = $request->body;
        $eposts->save();
        return back()->with('post created', 'post has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Epost  $epost
     * @return \Illuminate\Http\Response
     */
    public function show(Epost $epost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Epost  $epost
     * @return \Illuminate\Http\Response
     */
    public function edit(Epost $epost)
    {
        return view('eposts.edit',compact('epost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Epost  $epost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Epost $epost)
    {
        $epost->update($request->all());
        return back()->with('post updated', 'Your post has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Epost  $epost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Epost $epost)
    {
        $epost->delete();
        return redirect()->route('eposts.index')->with('post deleted','Your Post has been deleted successfully');
    }
}
