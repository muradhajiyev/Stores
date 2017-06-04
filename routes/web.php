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

Route::get('/admin', 'AdminController@index')->middleware('auth','onlystoreandadmin');

//specifications route

Route::get('/specifications','SpecificationsController@getSpecifications')->middleware('auth','onlystoreandadmin');
Route::get('/showDropdowns','SpecificationsController@showDropdowns')->middleware('auth','onlystoreandadmin');
Route::get('/specificationsForm', 'SpecificationsController@getSpecificationsForm')->middleware('auth','onlystoreandadmin');
Route::post('/addSpecification','SpecificationsController@store')->middleware('auth','onlystoreandadmin');
Route::get('deleteSpecification/{id}', ['as'=> 'deleteS', 'uses'=>'SpecificationsController@delete'])->middleware('auth','onlystoreandadmin');


//

//dropdowns route

Route::get('/dropdowns','DropdownsController@getDropdowns')->middleware('auth','onlystoreandadmin');
Route::get('/dropdownsForm', 'DropdownsController@getDropdownsForm')->middleware('auth','onlystoreandadmin');
Route::post('/addDropdown','DropdownsController@store')->middleware('auth','onlystoreandadmin');
Route::get('deleteDropdown/{id}', ['as'=> 'deleteD', 'uses'=>'DropdownsController@delete'])->middleware('auth','onlystoreandadmin');

//

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'onlystoreandadmin']], function () {
   Route::get('categories', function(){
      return view('admin.categories');
   });


   Route::get('/categories', 'AdminController@categories');
});

  Route::get('/403', function(){
  	return view('403.403');
  });


