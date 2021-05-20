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
/*
Route User
*/


Route::get('/','HomeController@index');
Route::get('/about','PageController@about');
Route::get('/shop','ShopController@index');
Route::get('/contact','ContactController@viewcontact');
Route::post('/sendemail', 'ContactController@sendmail');
Route::get('/singleproduct/{id}', 'SingleproductController@index');
Route::get('/singleproduct', 'PageController@singleproduct');
Route::get('/search-product','ShopController@index');
Route::get('/cart','PageController@cart');
Route::resource('loadcart','CartController');
Route::post('/addcart', 'CartController@addcart')->name('addcart');
Route::get('/deleteproductcart/{id}/{attribute_id}', 'CartController@deleteproductcart');
Route::get('/deletecart', 'CartController@deletecart')->name('deletecart');
Route::post('/updatecart', 'CartController@updatecart')->name('updatecart');

Route::middleware('auth')->group(function () {
    Route::get('logout', 'AuthController@logout');
    Route::get('/history-orders', 'OrderController@history');
    Route::get('/detailsorder/{id}', 'OrderController@detailhistory');
    Route::get('/profile', 'PageController@profile');
    Route::post('/profile', 'UserController@profile')->name('profile');
    Route::get('/resetpassword', 'PageController@resetpassword');
    Route::post('/resetpassword', 'UserController@resetpassword')->name('resetpassword');
    Route::get('/order', 'OrderController@index')->middleware('CheckCart');
    Route::post('/order','OrderController@store')->name('order');
    Route::get('/thanks','OrderController@thanks')->middleware('CheckOrder')->name('thanks');
    Route::get('/vnpay', 'PageController@vnpay')->middleware('CheckInfo')->name('vnpay');
    Route::get('/back','PaymentsController@back');
    Route::post('/payment','PaymentsController@index')->name('payment');
    Route::get('/vnpayreturn','PaymentsController@store')->name('vnpayreturn');
});
Route::middleware('CheckLoginAdmin')->group(function () {
    
    Route::get('/dashboard', 'HomeController@dashboard');
    
    //categoryproduct
    Route::get('/categoryproduct', 'CategoryproductController@index')->name('categoryproduct');
    Route::resource('categoryproduct-data', 'CategoryproductController');
    Route::get('/categoryproduct/{id}/destroy','CategoryproductController@destroy');
    Route::get('/addcategoryproduct', 'PageController@addcategoryproduct');
    Route::post('/addcategoryproduct', 'CategoryproductController@store');
    Route::post('/updatecategoryproduct', 'CategoryproductController@update')->name('updatecategoryproduct');
    Route::get('/categoryproduct/{id}/edit', 'CategoryproductController@edit');
    
    //member
    Route::get('/member', 'UserController@index')->name('member');
    Route::resource('member-data', 'UserController');
    Route::get('/member/{id}/edit', 'UserController@edit');
    Route::post('/updatemember', 'UserController@update')->name('updatemember');
    Route::post('/addmember', 'UserController@store')->name('addmember');
    Route::get('/member/{id}/destroy','UserController@destroy');

    // product
    Route::get('/products', 'ProductsController@index')->name('products');
    Route::resource('products-data', 'ProductsController');
    Route::get('/addproducts', 'ProductsController@create');
    Route::post('/addproduct', 'ProductsController@store')->name('addproduct');
    Route::get('/product/{id}/destroy','ProductsController@destroy');
    Route::get('/editproducts/{id}/edit', 'ProductsController@edit');
    Route::post('/editproduct', 'ProductsController@update')->name('editproduct');
    Route::get('/loadimages/{id}','ImagesproductController@index');
    Route::post('/editimages', 'ImagesproductController@update')->name('editimages');
    Route::get('/deleteimagesproduct/{name}', 'ImagesproductController@destroy');

    //orders
    Route::get('/ordersadmin', 'OrderController@indexadmin')->name('ordersadmin');

    // contact
    Route::get('/contacts', 'ContactController@index')->name('contacts');
    Route::resource('contacts-data', 'ContactController');
    Route::get('/contact/{id}/destroy','ContactController@destroy');
    Route::get('/editcontacts/{id}/edit', 'ContactController@edit');
    Route::post('/updatecontact', 'ContactController@update')->name('updatecontact');

    // info
    Route::get('/info', 'InfoController@index')->name('info');
    Route::post('/updateinfo', 'InfoController@update')->name('updateinfo');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
