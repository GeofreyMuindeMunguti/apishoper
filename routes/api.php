<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::namespace('Auth')->prefix('user')->group(function () {
     Route::post('/create','RegisterController@create');
     Route::post('/login','LoginController@login');
    // Route::post('/create', function(Request $request) {
    // 	return $request;
    // });
    
});

Route::post('/loginuser','UserController@loginuser');//login the existing user

//customer order operations...
Route::post('/savetocart','CartController@save');
Route::post('/edittocart','CartController@edit');
Route::get('/showmycart','CartController@showcart');
Route::get('/viewallcart','CartController@viewall');
Route::get('/deletecart','CartController@delete');


//supermarket operations
Route::post('/savesupermartket','SupermarketController@save');
Route::get('/viewsupermarkets','SupermarketController@viewsupermarkets');
Route::get('/viewnearsupermarkets','SupermarketController@viewnearsupermarket');
Route::get('/deletesupermarket','SupermarketController@delete');
Route::post('/additems','SupermarketController@saveitem');
Route::post('/updateitems','SupermarketController@updateitem');
Route::get('/viewitem','SupermarketController@viewitem');
Route::get('/viewallitems','SupermarketController@viewallitems');
Route::get('/deleteitem','SupermarketController@deleteitem');


//shoppedcart operations...
Route::post('/saveshoppedcart','ShoppedcartController@save');
Route::post('/editshoppedcart','ShoppedcartController@edit');
Route::get('/showshoppedcart','ShoppedcartController@showcart');
Route::get('/viewallshoppedcart','ShoppedcartController@viewall');
Route::get('/deleteshoppedcart','ShoppedcartController@delete');



//bodabodaguy operations..
Route::post('/saveboda','BodabodaguyController@save');
Route::post('/editboda','BodabodaguyController@editboda');
Route::get('/deleteboda','BodabodaguyController@delete');
Route::get('/deliveries','BodabodaguyController@deliveries');
Route::get('/assigneddelivery','BodabodaguyController@assigneddelivery');
Route::get('/bodabodaguyaccount','BodabodaguyController@myaccount');
Route::get('/loginbodauser','BodabodaguyController@loginbodauser');
Route::get('/showbodaguys','BodabodaguyController@showusers');