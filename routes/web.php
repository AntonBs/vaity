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

Route::get('/', 'PostController@index')->name('post.index');
Route::post('post/', 'PostController@store')->name('post.store');
Route::post('post/upload', 'PostController@upload')->name('post.upload');
Route::get('post/create', 'PostController@create')->name('post.create');
Route::get('post/show/{id}','PostController@show')->name('post.show');
Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::delete('post/{id}', 'PostController@destroy')->name('post.destroy');
Route::patch('post/show/{id}', 'PostController@update')->name('post.update');
