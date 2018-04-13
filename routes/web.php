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
    return view('welcome');
});

// Route::group(['prefix' => 'api'], function() {
//     Route::get('/customers', 'CustomersController@index');

// Route::get('/customer/{id}', 'CustomersController@show');

// Route::post('/customer/add', 'CustomersController@store');

// Route::post('/customer/update/{id}', 'CustomersController@update');

// Route::delete('/customer/delete/{id}', 'CustomersController@destroy');
// });
