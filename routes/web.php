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


Auth::routes();

//tuk pi6em
Route::get('/', 'PostController@index')->name('home');
Route::get('/home', 'PostController@index');

Route::get('/profile','ProfileController@create')->name('profile');
Route::post('/profile/update', 'ProfileController@update')->name('profile_update');

Route::resource('posts','PostController');