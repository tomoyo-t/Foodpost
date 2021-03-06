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

Route::get('/','PostsController@index');
Route::get('form','PostsController@form')->name('posts.form');
Route::get('show','UserController@show')->name('user.show');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('like', 'LikeController@store')->name('like.like');
        Route::delete('unlike', 'LikeController@destroy')->name('like.unlike');
    });
    Route::resource('user', 'UserController', ['only' => 'index']);
    Route::resource('posts', 'PostsController', ['only' => ['store', 'show', 'edit', 'update', 'post', 'destroy']]);    
});



