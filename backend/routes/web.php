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

Route::get('/', 'ShopController@index');

Route::get('/mycart', 'ShopController@myCart')->middleware('auth');

Route::post('/mycart', 'ShopController@addMycart');
Auth::routes();


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::POST('/cartdelete','ShopController@deleteCart');

Route::post('/checkout', 'ShopController@checkout');
