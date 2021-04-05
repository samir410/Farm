<?php

use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });
Route::get('/','ClientController@Home');
Route::get('/shop','ClientController@Shop');



Route::get('/login','ClientController@Login');
Route::get('/signup','ClientController@Signup');

Route::get('/Dashboard','AdminController@Dashboard');

Route::get('/addslider','AdminController@Addslider');

Route::get('/addproduct','ProductController@Addproduct');
Route::post('/save_product','ProductController@saveproduct');
Route::get('/delete_product/{id}','ProductController@DeleteProduct');
Route::get('/edit_product/{id}','ProductController@EditProduct');
Route::post('/update_product','ProductController@UpdateProduct');
Route::get('/view_product','ProductController@viewproduct');
Route::get('/unactivate_product/{id}', 'ProductController@Unactivateproduct');
Route::get('/activate_product/{id}', 'ProductController@activateproduct');

Route::get('/addcategory','CategoryController@Category');
Route::post('/save_category','CategoryController@SaveCategory');
Route::get('/view_category','CategoryController@viewcategory');
Route::get('/edit_category/{id}','CategoryController@EditCategory');
Route::post('/update_category','CategoryController@UpdateCategory');
Route::get('/delete_category/{id}','CategoryController@DeleteCategory');

Route::get('/view_slider','ProductController@viewslider');
Route::post('/save_slider','ProductController@saveslider');
Route::get('/addslider','AdminController@Addslider');
Route::get('/edit_slider/{id}','ProductController@EditSlider');
Route::post('/update_slider','ProductController@updateslider');
Route::get('/delete_slider/{id}','ProductController@Deleteslider');
Route::get('/unactivate_slider/{id}', 'ProductController@Unactivateslider');
Route::get('/activate_slider/{id}', 'ProductController@activateslider');

Route::get('/view_order','ProductController@vieworder');

/////fronend
Route::get('/view_by_cat/{name}','CategoryController@view_by_cat');

////Cart
Route::get('/addToCart/{id}','CartController@addTocart');
Route::get('/cart','CartController@Cart');
Route::get('/remove_item/{id}','CartController@removeItem');
Route::post('/update_quantity','CartController@updatequantity');

//////Checkout
Route::get('/checkout','ClientController@Checkout');
Route::post('postcheckout','ClientController@postcheckout');


