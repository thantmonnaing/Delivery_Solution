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

Route::middleware('role:admin')->group(function (){

Route::get('backend', 'BackendController@home')->name('backend');

// customer

Route::resource('customer', 'CustomerController');


Route::post('customerblock/{id}', 'CustomerController@block')->name('customer.block');

Route::get('customerunblock/{id}','CustomerController@unblock')->name('customer.unblock');

//deliver


Route::resource('deliver','DeliverController');

Route::post('block/{id}','DeliverController@block')->name('deliver.block');

Route::get('unblock/{id}','DeliverController@unblock')->name('deliver.unblock');

//admin

Route::resource('admin','AdminController');

Route::get('adminlogout', 'AdminController@logout')->name('admin.logout');

Route::post('adminregister', 'AdminController@store')->name('admin.register');

// blacklist

Route::get('blacklist','BackendController@blacklist')->name('blacklist');

// township

Route::resource('township','TownshipController');

//order

Route::resource('order','OrderController');


Route::get('signup', 'BackendController@signup')->name('signup');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// frontend

Route::get('/', 'FrontendController@index')->name('main');

Route::get('frontendlogin', 'FrontendController@login')->name('frontend.login');


