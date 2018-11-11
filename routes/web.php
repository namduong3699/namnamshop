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

Route::get('/', 'HomeController@index');
Route::get('/index', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::get('/product', 'HomeController@product');
Route::get('/shoping-cart', 'HomeController@shopingcart');
Route::get('/blog', 'HomeController@blog');
Route::get('/blog-detail', 'HomeController@blogdetail');
Route::get('/product-detail', 'HomeController@productdetail');
// Route::get('/test', function () {
//     return view('main');
// });
