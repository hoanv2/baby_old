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

Route::get('/', function () {
    return view('client.index');
});


//Route::resource('user','admin\UserController');
Route::get('user','admin\UserController@index')->name('users.index');
Route::post('user/store','admin\UserController@store')->name('users.store');
Route::post('user/create','admin\UserController@create')->name('users.create');
Route::post('user/edit','admin\UserController@edit')->name('users.edit');
Route::post('user/update','admin\UserController@update')->name('users.update');
Route::delete('user/{id}','admin\UserController@destroy')->name('users.destroy');


Route::get('product','admin\ProductController@index')->name('products.index');
Route::get('product/show/{id}','admin\ProductController@show')->name('products.show');
Route::get('product/create','admin\ProductController@create')->name('products.create');
Route::post('product/store','admin\ProductController@store')->name('products.store');
Route::get('product/edit/{id}','admin\ProductController@edit')->name('products.edit');
Route::put('product/update/{id}','admin\ProductController@update')->name('products.update');
Route::delete('product/{id}','admin\ProductController@destroy')->name('products.destroy');


Route::get('category','admin\CategoryController@index')->name('category.index');
Route::post('category/store','admin\CategoryController@store')->name('category.store');
Route::post('category/create','admin\CategoryController@create')->name('category.create');
Route::post('category/edit','admin\CategoryController@edit')->name('category.edit');
Route::post('category/update','admin\CategoryController@update')->name('category.update');
Route::delete('category/{id}','admin\CategoryController@destroy')->name('category.destroy');


