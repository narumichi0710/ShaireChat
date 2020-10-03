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

//Route::get('/', function () {
    //return view('welcome');
//});

Auth::routes();

Route::get('/', 'App\Http\Controllers\PostController@index')->name('posts.index');

Route::get('/posts/search', 'App\Http\Controllers\PostController@search')->name('posts.search');

Route::resource('/posts', 'App\Http\Controllers\PostController')->except(['index']);

Route::resource('/users', 'App\Http\Controllers\UserController');
Route::resource('/comments', 'App\Http\Controllers\CommentController')->middleware('auth');

Route::get('/edit', 'App\Http\Controllers\EditController@index')->name('edit.index');

Route::get('/user', 'App\Http\Controllers\UserController@index')->name('user.index')->middleware('auth');


Route::get('/user/userEditEmail', 'App\Http\Controllers\UserController@userEditEmail')->name('user.userEditEmail')->middleware('auth');
Route::post('/user/userEditEmail', 'App\Http\Controllers\UserController@userUpdateEmail')->name('user.userUpdateEmail')->middleware('auth');
Route::get('/user/userEdit', 'App\Http\Controllers\UserController@userEdit')->name('user.userEdit')->middleware('auth');
Route::post('/user/userEdit', 'App\Http\Controllers\UserController@userUpdate')->name('user.userUpdate')->middleware('auth');

Route::post('posts/{post}/favorites', 'App\Http\Controllers\FavoriteController@store')->name('favorites');
Route::post('posts/{post}/unfavorites', 'App\Http\Controllers\FavoriteController@destroy')->name('unfavorites');

Route::get('/product', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/product/list', 'App\Http\Controllers\ProductController@list');
Route::post('/product/review', 'App\Http\Controllers\ProductController@review')->name('product.review');

Route::resource('/product', 'App\Http\Controllers\ProductController', ['only' => ['index', 'show']]);




