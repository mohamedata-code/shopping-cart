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



Route::get('/', 'ProductController@shop')->name('shop');
Route::get('/shop', 'ProductController@shop')->name('shop');
Route::get('/search', 'ProductController@search')->name('search');
Route::post('filter_price', 'ProductController@filterProduct')->name('filter_price');

Route::get('/cart', 'ShoppingCartController@cart')->name('cart.index');
Route::post('/add', 'ShoppingCartController@add')->name('cart.store');
Route::post('/update', 'ShoppingCartController@update')->name('cart.update');
Route::post('/remove', 'ShoppingCartController@remove')->name('cart.remove');
Route::post('/clear', 'ShoppingCartController@clear')->name('cart.clear');

