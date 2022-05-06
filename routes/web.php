<?php

use App\Http\Controllers\Blog\Admin\CategoryController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Blog\Admin\PostController as AdminPostController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource('rest', RestTestController::class)->names('restTest');

// ----- BLOG ----- //

Route::group(["prefix" => "blog"], function() {
    Route::resource('posts', PostController::class)->names('blog.posts');
});

// --- Blog Admin

$adminGroupData = [
    'prefix' => 'admin/blog'
];

Route::group($adminGroupData, function(){
    $methods = ['index', 'edit', 'update', 'create', 'store'];
    Route::resource('categories', CategoryController::class)
        ->only($methods)
        ->names('blog.admin.categories');

    Route::resource('posts', AdminPostController::class)
        ->except(['show'])
        ->names('blog.admin.posts');
});


