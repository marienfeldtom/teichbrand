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

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/orders/create', 'OrderController@create');
Route::get('/payment/{token}', 'HomeController@payment');
Route::post('/orders', 'OrderController@store');
Route::get('/orders/pdf/{token}', 'OrderController@pdf');
Route::get('/orders/ticket/{token}', 'OrderController@ticket');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/orders', 'OrderController@index');
    Route::get('/orders/csv', 'OrderController@export');
    Route::get('/orders/paid/{order}', 'OrderController@paid');
    Route::get('/orders/ship/{token}', 'OrderController@ship');
    Route::delete('/orders/{order}', 'OrderController@destroy');
});
