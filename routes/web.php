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
// Route::get('/', function () {
//     return view('pages.home');
// });

// use App\Models\Categoryproduct;

// Route::middleware('CheckLogin')->group(function () {
//     Route::get('/login','PageController@login');
//     Route::post('login', 'AuthController@login')->name('login');
//     Route::get('/register','PageController@register');
//     Route::get('/forgetpassword','PageController@forgetpassword');
// });

Route::get('/','HomeController@index');
// Route::get('/resetpassword','PageController@resetpassword');
Route::get('/about','PageController@about');
Route::get('/shop','ShopController@index');
Route::get('/contact','PageController@contact');
Route::get('/cart','PageController@cart');
Route::get('/singleproduct', 'PageController@singleproduct');
Route::get('/search-product','ShopController@index');

Route::middleware('auth')->group(function () {
    Route::get('logout', 'AuthController@logout');
    Route::get('/history-orders', 'PageController@history');
    Route::get('/profile', 'PageController@profile');
    Route::get('/checkout', 'PageController@checkout');
});
Route::middleware('CheckLoginAdmin')->group(function () {
    
    Route::get('/dashboard', 'PageController@dashboard');
   
    // categoryproduct
    // Route::get('/categoryproduct', 'CategoryproductController@index');
    // gọi load trang lần đầu
    Route::get('/categoryproduct', 'CategoryproductController@index')->name('categoryproduct');
    // load db ajax reload
    Route::resource('categoryproduct-data', 'CategoryproductController');
    Route::get('/categoryproduct/{id}/destroy','CategoryproductController@destroy');
    Route::get('/addcategoryproduct', 'PageController@addcategoryproduct');
    Route::post('/addcategoryproduct', 'CategoryproductController@store');
    Route::post('/updatecategoryproduct', 'CategoryproductController@update')->name('updatecategoryproduct');
    Route::get('/categoryproduct/{id}/edit', 'CategoryproductController@edit');
    // Route::get('/editcategoryproduct/{id}', 'CategoryproductController@edit');

    // member, user
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

    //orders
    Route::get('/orders', 'OrderController@index')->name('orders');

    // contact
    Route::get('/contacts', 'ContactController@index')->name('contacts');

    // info
    Route::get('/info', 'InfoController@index')->name('info');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
