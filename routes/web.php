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



Auth::routes();
Route::get('/', 'App\Http\Controllers\PostController@index')->name('posts.index');
Route::get('/edit', 'App\Http\Controllers\EditController@index')->name('edit.index');
Route::resource('/users', 'App\Http\Controllers\UserController');
Route::resource('/posts', 'App\Http\Controllers\PostController')->except(['index']);

Route::prefix('post')->group(function () {
    Route::get('/search', 'App\Http\Controllers\PostController@search')->name('posts.search');
    Route::post('/{post}/favorites', 'App\Http\Controllers\FavoriteController@store')->name('favorites');
    Route::post('/{post}/unfavorites', 'App\Http\Controllers\FavoriteController@destroy')->name('unfavorites');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/comments', 'App\Http\Controllers\CommentController');
    Route::get('/user', 'App\Http\Controllers\UserController@index')->name('user.index');
    Route::get('/user/userEditEmail', 'App\Http\Controllers\UserController@userEditEmail')->name('user.userEditEmail');
    Route::post('/user/userEditEmail', 'App\Http\Controllers\UserController@userUpdateEmail')->name('user.userUpdateEmail');
    Route::get('/user/userEdit', 'App\Http\Controllers\UserController@userEdit')->name('user.userEdit');
    Route::post('/user/userEdit', 'App\Http\Controllers\UserController@userUpdate')->name('user.userUpdate');
    Route::get('/user/deleteConfirm', 'App\Http\Controllers\UserController@deleteConfirm')->name('user.deleteConfirm');
    Route::post('/user/deleteConfirm', 'App\Http\Controllers\UserController@delete')->name('user.delete');
});
