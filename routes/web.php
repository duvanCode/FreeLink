<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\mail;
use App\Mail\PruebaMail;
use App\Http\controllers\AdminUsersController;
use App\Http\controllers\UserController;
use App\Http\controllers\UserProfileController;
use App\Http\controllers\PostController;
use App\Models\Post;

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

Route::get('/', function () 
{
   $posts = Post::inRandomOrder()->paginate(50);
   return view('welcome',compact('posts'));
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/admin/user',AdminUsersController::class);
Route::resource('/user/post',PostController::class);
Route::resource('/nor',UserController::class);
Route::resource('/user/profile',UserProfileController::class);
Route::get('/buscar', [App\Http\Controllers\QueryController::class, 'index'])->name('buscar');
Route::get('/about', function(){return view('about');})->name('about');

