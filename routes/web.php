<?php

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

Route::resource('/', \App\Http\Controllers\Main\AdminController::class);

Route::resource('category', \App\Http\Controllers\CategoryController::class);
Route::resource('tag', \App\Http\Controllers\TagController::class);
Route::resource('color', \App\Http\Controllers\ColorController::class);
Route::resource('user', \App\Http\Controllers\UserController::class);
