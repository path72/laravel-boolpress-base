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

/**
 * static pages
 */
Route::get('/','MainController@index')->name('home');

/**
 * DB-feeded pages
 */
Route::resource('/posts','PostController');

