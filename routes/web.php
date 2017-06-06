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
<<<<<<< HEAD

Route::get('/cat',['uses'=>'AdminController@manageCategory2']);

=======
>>>>>>> 5bbc5a8027aefb59cd35969af7bc204f39402134
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');

     Route::get('/categories',['uses'=>'AdminController@manageCategory']);
     Route::post('add-category',['as'=>'add.category','uses'=>'AdminController@addCategory']);

    Route::resource('dropdowns', 'DropdownController');
    Route::resource('specifications', 'SpecificationController');
});
<<<<<<< HEAD
=======


Route::get('/403', function(){
   return view('403.403');
});
>>>>>>> 5bbc5a8027aefb59cd35969af7bc204f39402134
