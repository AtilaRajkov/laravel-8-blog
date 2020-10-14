<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

/*
|---------------------------- ----------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [BlogController::class, 'index'])
  ->name('blog.index');

Route::get('/blog/show/{post}', [BlogController::class, 'show'])
  ->name('blog.show');

Route::get('/category/{category}', [BlogController::class, 'category'])
  ->name('category');
//
Route::get('/author/{author}', [BlogController::class, 'author'])
  ->name('author');

Auth::routes();

Route::get('/home', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('home');

Route::resource('/backend/blog', App\Http\Controllers\Backend\BlogController::class);
