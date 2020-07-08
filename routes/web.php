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

// Route::get('/', function () {
//     return view('shop.index');
// });

// Redirect /home to our home page
Route::get('/home', function(){
	return redirect("/");
});
//Route::get('/home', 'ProductController@getCart')->name('home');

Route::get('/userLogout', 'Auth\LoginController@userLogout')->name('userLogout');

Route::get('/', 'ProductController@index')->name('home');
Route::any('/addToCart/{id}', 'ProductController@getAddToCart')->name('addToCart');
Route::any('/displayCart', 'ProductController@getCart')->name('displayCart');

// Reduce an item qty from the cart by one.
Route::any('/getReduceByOne/{id}', 'ProductController@getReduceByOne')->name('getReduceByOne');

// Remove an item from the cart.
Route::any('/getRemoveItem/{id}', 'ProductController@getRemoveItem')->name('getRemoveItem');
// Only Logged in users can enter 
Route::group(['middleware' => ['auth']], function () {
    // Remove an item from the cart.
	Route::get('/checkout', 'ProductController@checkout')->name('checkout');

	// Remove an item from the cart.
	Route::post('/postcheckout', 'ProductController@postcheckout')->name('postcheckout');
});



// Admin

Route::get('/admin/loginform', 'Admin\AdminloginController@showloginform')->name('admin.login');
Route::get('/admin/logout', 'Admin\AdminLoginController@adminLogout')->name('admin.logout');

Route::post('/admin/login/submit', 'Admin\AdminloginController@login')->name('admin.login.submit');

// Load the dashboard page
Route::get('/admin/dashbaord', 'admin\AdminController@dashboard')->name('admin.dashboard');

// Load the add product page
Route::get('/admin/addproduct', 'admin\AdminController@addproduct')->name('addproduct');

// Load the add product page
Route::post('/admin/addproductsave', 'admin\AdminController@addproductsave')->name('addproductsave');

// Load the display products page
Route::get('/admin/products', 'admin\AdminController@displayproducts')->name('displayproducts');

// Load the edit product page
Route::get('/admin/product/edit/{id}', 'admin\AdminController@editproduct')->name('editproduct');

// Update the edited product info
Route::post('/admin/product/update/{id}', 'admin\AdminController@updateproduct')->name('updateproduct');

// Delete a particular product
Route::get('/admin/product/delete/{id}', 'admin\AdminController@deleteproduct')->name('deleteproduct');

// Display All Orders
Route::get('/admin/allOrders', 'admin\AdminController@allOrders')->name('allOrders');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
