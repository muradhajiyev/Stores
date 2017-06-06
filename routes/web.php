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
Route::get('/storeregister', function () {
    return view('auth/storeregister');
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');
    Route::get('/categories', 'AdminController@categories');
    Route::resource('dropdowns', 'DropdownController');
    Route::resource('specifications', 'SpecificationController');
    Route::post('/dropdownValues/update', 'DropdownController@updateDropdownValue');
});


Route::get('/403', function(){
   return view('403.403');
});