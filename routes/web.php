<?php

use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\RestTestController;
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

Route::group(["prefix" => "blog"], function() {
    Route::resource('posts', PostController::class)->names('blog.posts');
});

Route::resource('rest', RestTestController::class)->names('restTest');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
