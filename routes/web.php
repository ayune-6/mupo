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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');



Route::get('/home', 'HomeController@index')->name('home');
//Route::post('/home', 'ProfileController@getuser')->name('home');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/register', 'Auth\RegisterController@register');

Route::group(['prefix' => 'admin', 'middlesware' => 'auth'], function() {
	Route::get('post/upload', 'Admin\PostController@videoupload');
	Route::get('post/create', 'Admin\PostController@informationpost');
	Route::post('post/create', 'Admin\PostController@create');

});

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/ajax/like/user_list', 'LikesController@user_list');
Route::post('/like', 'LikesController@like')->name('like');

Route::group(['prefix' => '/profile','middleware'=>'auth'],function(){
	Route::get('/create', 'Admin\ProfileController@add');
	Route::post('/create', 'Admin\ProfileController@create');
	Route::get('/edit/{username}', 'Admin\ProfileController@edit')->name('/profile/edit');
	Route::post('/edit', 'Admin\ProfileController@update');
	Route::get('/{username}', 'ProfileController@show')->name('/profile');
	
});





