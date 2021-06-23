<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FluentController extends Controller
{
    public function index(){

        echo '<h1>Fluent String</h1>';

        $slice = Str::of('Welcome to my website')->after('Welcome to');
            echo $slice .'<br>';
        $sliece2 = Str::of('App\Http\Controllers\Controller')->afterLast('\\');
            echo $sliece2.'<br>';
        $string = Str::of('Hello')->append('World');
        echo $string.'<br>';
        $result = Str::of('Laravel 8')->lower();
        echo $result.'<br>';
        $replaces = Str::of('Laravel 8')->replace('8','9');
        echo $replaces.'<br>';
        $converted = Str::of('this is title')->title();
        echo $converted.'<br>';
        $slug = Str::of('Laravel 8 Framework')->slug();
        echo $slug.'<br>';
        $string = Str::of('Laravel Framework')->substr(8,5);
        echo $string.'<br>';
        $string = Str::of('/Laravel8/')->trim('/');
        echo $string.'<br>';
    }
}
