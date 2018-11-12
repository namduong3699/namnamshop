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

Route::get('/', 'UserController@index');
Route::get('/index', 'UserController@index');
Route::get('/about', 'UserController@about');
Route::get('/contact', 'UserController@contact');
Route::get('/product', 'UserController@product');
Route::get('/shoping-cart', 'UserController@shopingcart');
Route::get('/blog', 'UserController@blog');
Route::get('/blog-detail', 'UserController@blogdetail');
Route::get('/product-detail', 'UserController@productdetail');
// Route::get('/test', function () {
//     return view('main');
// });

Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

	Route::get('/', function () {
		return view('admin');
	});
	Route::get('/index', function () {
		return view('admin');
	});
	Route::get('/general', function () {
		return view('admin');
	});
	//**********catalog***********//
	Route::get('/catalog','HomeController@catalogView');

	Route::get('/catalog/edit/{id}','HomeController@catalogEdit');

	Route::post('/catalog/update','HomeController@catalogUpdate')->name('updatecatalog');

	Route::get('/catalog/delete/{id}','HomeController@catalogDelete');

	Route::post('/addCatalog','HomeController@catalog')->name('addcatalog');
	//**********product***********//	

	Route::get('/product','HomeController@productView');

	Route::post('/addProduct','HomeController@product')->name('addproduct');

	Route::get('/product/edit/{id}','HomeController@productEdit');

	Route::post('/product/update','HomeController@productUpdate')->name('updateproduct');

	Route::get('/product/delete/{id}','HomeController@productDelete');

	//**********product***********//	

	Route::get('/transaction', function () {
		return view('transaction');
	});
	Route::get('/order', function () {
		return view('order');
	});
	//**********users***********//	
	Route::get('/userManagement', 'HomeController@userManagement');

});