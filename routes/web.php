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

if (env('APP_ENV') === 'production')
{
    URL::forceScheme('https');
}


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');



Route::get('/home', 'HomeController@index')->name('home');
//Route::post('/home', 'ProfileController@getuser')->name('home');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::get('/delete/{id}', 'Admin\ProfileController@destroy')->middleware('auth')->name('/delete');

Route::group(['prefix' => 'admin', 'middlesware' => 'auth'], function() {
	Route::get('post/upload', 'Admin\PostController@videoupload');
	Route::get('post/create', 'Admin\PostController@informationpost');
	Route::post('post/create', 'Admin\PostController@create');
	Route::get('post/delete/{id}', 'Admin\PostController@delete')->name('admin/post/delete');

});

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/likes/{postId}', 'LikesController@user_list')->name('/likes');
Route::get('/like', 'LikesController@like')->name('like');

Route::group(['prefix' => '/profile','middleware'=>'auth'],function(){
	Route::get('/create', 'Admin\ProfileController@add');
	Route::post('/create', 'Admin\ProfileController@create');
	Route::get('/edit/{username}', 'Admin\ProfileController@edit')->name('/profile/edit');
	Route::post('/edit', 'Admin\ProfileController@update');
	Route::get('/{username}', 'ProfileController@show')->name('/profile');
	
});

//Route::post('/home', 'HomeController@get');
Route::post('/search-result', 'HomeController@searchResult')->name('/search-result');




