<?php

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




Route::resource('index', 'PostController');
Route::get('about', 'PostController@about');
Route::get('services', 'PostController@services');


Auth::routes();

Route::get('/', 'HomeController@index');
