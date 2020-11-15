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

Route::get('/', 'BackendController@home')->name('backend');

Route::resource('customer', 'CustomerController');
Route::get('signup', 'BackendController@signup')->name('signup');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


