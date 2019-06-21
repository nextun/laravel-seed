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

/***Views***/
Route::get('/', function () {
    return view('main');
})->name('home');


/***functions***/
/*Product*/
Route::get('/products', ['uses' => 'ProductController@all'])->name('products');
Route::get('/add-product/{id?}', ['uses' => 'ProductController@get'])->name('add-product');
Route::post('/create-product', ['uses' => 'ProductController@create'])->name('create-product');
Route::post('/update-product', ['uses' => 'ProductController@update'])->name('update-product');
Route::get('/delete-product/{id}', ['uses' => 'ProductController@delete'])->name('delete-product');

/*Customer*/
Route::get('/customers', ['uses' => 'CustomerController@all'])->name('customers');
Route::get('/add-customer/{id?}', ['uses' => 'CustomerController@get'])->name('add-customer');
Route::post('/create-customer', ['uses' => 'CustomerController@create'])->name('create-customer');
Route::post('/update-customer', ['uses' => 'CustomerController@update'])->name('update-customer');
Route::get('/delete-customer/{id}', ['uses' => 'CustomerController@delete'])->name('delete-customer');
