<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\FluentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UploadController;
use \App\Http\Controllers\EpostController;
use App\Http\Controllers\RoleController;
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

//join
Route::get('inner-join',[PostController::class,'innerJoin'])->name('post.innerjoin');
Route::get('left-join',[PostController::class,'leftJoin'])->name('post.leftjoin');
Route::get('right-join',[PostController::class,'rightJoin'])->name('post.rightjoin');

//model
Route::get('get-posts',[PostController::class,'getAllPostByModel'])->name('post.get-posts');

//blade
Route::get('/test', function (){
   return view('test');
});

Route::get('/index', function (){
    return view('index');
});
Route::get('/about', function (){
    return view('about');
});
Route::get('/contact', function (){
    return view('contact');
});

//pagination
Route::get('/users',[\App\Http\Controllers\PaginationController::class,'allUser']);

//file upload
Route::get('/upload', [UploadController::class, 'uploadForm'])->name('upload.form');
Route::post('/upload', [UploadController::class, 'fileUpload'])->name('upload.fileUpload');

//localization
//Route::get('/{locale}', function ($locale){
//    App::SetLocale($locale);
//    return view('locale');
//});

//facade
Route::get('/payments',function (){
   return Payment::process();
});

//Eloquent
Route::get('/students',[StudentController::class,'index']);
Route::resource('eposts',EpostController::class);
Route::get('/add-user', [UserController::class, 'insertRecord']);
Route::get('/get-phone/{id}', [UserController::class, 'fetchPhoneByUser']);
Route::get('/add-epost',[EpostController::class,'addEpost']);
Route::get('/add-comment/{id}',[EpostController::class,'addComment']);
Route::get('/get-comments/{id}',[EpostController::class,'getCommentsByPost']);
Route::get('/add-role', [RoleController::class,'addRole']);
Route::get('/add-user', [RoleController::class,'addUser']);
Route::get('/rolesbyuser/{id}', [RoleController::class, 'getAllRoleByUsers']);
Route::get('/usersbyrole/{id}', [RoleController::class, 'getAllUsesByRole']);

//Image CRUD
Route::get('add-teacher',[TeacherController::class,'create'])->name('teacher.create');
Route::post('add-teacher',[TeacherController::class,'store'])->name('teacher.store');
Route::get('all-teachers',[TeacherController::class, 'index'])->name('teacher.index');
Route::get('edit-teacher/{id}',[TeacherController::class, 'edit'])->name('teacher.edit');
Route::post('update-teacher',[TeacherController::class, 'update'])->name('teacher.update');
Route::get('delete-teacher/{id}', [TeacherController::class,'destroy'])->name('teacher.destroy');
