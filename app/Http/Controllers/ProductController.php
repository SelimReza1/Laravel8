<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $fruits =['apple', 'mango','pineapple', 'goava'];
        return view('welcome',compact('fruits'));
    }

    //autocomplete search

    public function addProduct(){
        $products = [
            ['name' => 'Phone'],
            ['name' => 'Tablate'],
            ['name' => 'Laptop'],
            ['name' => 'Television'],
            ['name' => 'Freeze']
        ];
        Product::insert($products);
        return 'product has been inserted successfully';
    }

    public function search(){
        return view('search');
    }

    public function autoComplete(Request $request){
        $datas = Product::select('name')->where('name',"LIKE","%{$request->terms}%")->get();

        return response()->json($datas);
    }

}
