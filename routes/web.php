<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\FluentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('product.index');

Route::get('/home/{name?}',[HomeController::class,'index'])->name('home.index');
Route::get('/user', [UserController::class, 'index'])->name('user.index');

//Http Client Route
Route::get('/posts', [ClientController::class, 'getAllPosts'])->name('posts.allposts');
Route::get('postbyid/{id}',[ClientController::class, 'getPostById'])->name('posts.getpostbyid');
Route::get('addpost', [ClientController::class, 'addPost'])->name('posts.addpost');
Route::get('updatepost',[ClientController::class,'updatePost'])->name('posts.updatepost');
Route::get('deletepost/{id}',[ClientController::class,'deletePost'])->name('posts.deletepost');

//String
Route::get('fluent-string', [FluentController::class, 'index'])->name('fluent.index');

//http request with form
Route::get('/login',[LoginController::class,'index'])->name('login.index');
Route::post('/submit',[LoginController::class,'loginSubmit'])->name('login.submit')->middleware('checkUser');

//database start
Route::get('/posts',[PostController::class,'getAllPost'])->name('post.getAllPost');

Route::get('add-post',[PostController::class,'addPost'])->name('post.add');
Route::post('submit-post',[PostController::class,'submitPost'])->name('post.submit');
Route::get('single-post/{id}',[PostController::class,'getPostById'])->name('post.single');
Route::get('edit-post/{id}',[PostController::class,'editPost'])->name('post.edit');
Route::post('/update-post',[PostController::class,'updatePost'])->name('post.update');
Route::get('delete-post/{id}',[PostController::class,'deletePost'])->name('post.delete');
