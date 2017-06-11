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

Route::get('/','HomeController@show');
Route::get('/{name}/stores/{id}', 'HomeController@showSpecificStores');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/storeregister', function () {
    return view('auth/storeregister');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');
    Route::resource('store', 'StoreController');
    Route::resource('dropdowns', 'DropdownController');
    Route::resource('specifications', 'SpecificationController');
    Route::resource('categories', 'CategoryController');
    Route::post('/dropdownValues/update', 'DropdownController@updateDropdownValue');
});

Route::group(['prefix' => 'store'], function () {

    Route::get('/', 'HomeController@show');

    Route::get('/{id}', ['as' => 'store.index', 'uses' => 'HomeController@profile']);

    Route::get('/blog', function () {
        return view('temp.blog');
    });


    Route::get('/blog-single', function () {
        return view('temp.blog-single');
    });
    Route::get('/cart', function () {
        return view('temp.cart');
    });
    Route::get('/checkout', function () {
        return view('temp.checkout');
    });
    Route::get('/contactus', function () {
        return view('temp.contactus');
    });
    Route::get('/login', function () {
        return view('auth.login');
    });
    Route::get('/product-details', function () {
        return view('temp.product-details');
    });
    Route::get('/shop', function () {
        return view('temp.shop');
    });
});
Route::resource("product", 'ProductController');
Route::group(['prefix' => 'api'], function () {
    Route::get('subCategory/{id}', 'CategoryController@getSubCategories');
    Route::get('specifications/{id}','CategoryController@getSpecificationsByCategoryId');
    Route::get('specification/{id}/type', 'SpecificationController@getSpecTypeAndUnit');
    Route::get('dropdownValues/{id}', 'DropdownController@getDropdownValues');
    });
Route::get('/403', function () {
    return view('403.403');
});
