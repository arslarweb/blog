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
//account
Route::group(['middleware'=>['auth']], function(){
	//Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/my/account/{slug}', 'ProfileController@index');
	Route::get('/changephoto/{id}', 'ProfileController@changephoto');
	//Route::get('/changephoto', function () {
    //return view('profile.pic');
	//});
	Route::get('/mainpage', 'StaticController@articles');
	Route::post('/uploadPhoto', 'ProfileController@uploadPhoto');
	Route::get('/welcomefull', 'StaticController@fulltext');
});

//::get('/logout', 'Auth\LoginController@logout');

//admin
Route::group(['middleware'=>['auth']], function() {
    Route::get('/admin', 'Admin\AdminController@index')->name('admin');
    Route::get('/admin/articles/add', 'Admin\AdminController@add');
    Route::post('/admin/articles/save', 'Admin\AdminController@save');
});



