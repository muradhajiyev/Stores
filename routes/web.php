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

    Route::get('/profile', function () {
        return view('store.index');
    });

    Route::get('/blog', function () {
        return view('pages.blog');
    });


    Route::get('/blog-single', function () {
        return view('pages.blog-single');
    });
    Route::get('/cart', function () {
        return view('pages.cart');
    });
    Route::get('/checkout', function () {
        return view('pages.checkout');
    });
    Route::get('/contactus', function () {
        return view('pages.contactus');
    });
    Route::get('/login', function () {
        return view('auth.login');
    });
    Route::get('/product-details', function () {
        return view('pages.product-details');
    });
    Route::get('/shop', function () {
        return view('pages.shop');
    });
});

    Route::resource("product", 'ProductController');



Route::get('/403', function () {
    return view('403.403');
});
