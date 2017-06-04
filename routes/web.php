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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/storeregister', function(){
	return view('auth/storeregister');
	});

Route::get('/admin', 'AdminController@index');
Route::get('/categories', function(){
   return view('admin.categories');
});


Route::get('/storelist', 'StoreController@index')->name('storelist');
Route::post('/deleteeditstore', 'StoreController@deleteEditStore')->name('deleteeditstore');

Route::post('/addstore', 'StoreController@addStore')->name('addstore');

Route::group(['prefix' => 'admin'], function () {
   Route::get('categories', function(){
      return view('admin.categories');
   });
});


