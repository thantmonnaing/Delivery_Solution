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

Route::post('getdeliver', 'OrderController@getdeliver')->name('getdeliver');

Route::post('confirm', 'OrderController@confirm')->name('order.confirm');

Route::get('pair', 'OrderController@pair')->name('pair.index');


Route::get('signup', 'BackendController@signup')->name('signup');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// frontend

Route::get('/', 'FrontendController@index')->name('main');

Route::get('frontendlogin', 'FrontendController@login')->name('frontend.login');

Route::get('frontendlogout', 'FrontendController@logout')->name('frontend.logout');

Route::get('customerregister', 'FrontendController@customerregister')->name('frontend.customerregister');

Route::get('deliverregister', 'FrontendController@deliverregister')->name('frontend.deliverregister');

Route::post('customerstore', 'FrontendController@customerstore')->name('frontend.customerstore');

Route::post('deliverstore', 'FrontendController@deliverstore')->name('frontend.deliverstore');

Route::get('customerorder', 'FrontendController@order')->name('frontend.order');

Route::post('orderstore', 'FrontendController@orderstore')->name('orderstore');

Route::post('addway', 'FrontendController@addway')->name('addway');

Route::get('profile','FrontendController@edit')->name('frontend.profile');

Route::post('customerupdate', 'FrontendController@customerupdate')->name('frontend.customerupdate');

Route::get('deliverprofile','FrontendController@deliveredit')->name('frontend.deliverprofile');

Route::post('deliverupdate', 'FrontendController@deliverupdate')->name('frontend.deliverupdate');

Route::get('about', 'FrontendController@about')->name('about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('about', 'FrontendController@about')->name('about');

Route::get('customerhistory', 'FrontendController@customerhistory')->name('customerhistory');

Route::get('deliverhistory', 'FrontendController@deliverhistory')->name('deliverhistory');

Route::post('done', 'FrontendController@done')->name('order.done');

Route::get('orderway/{id}', 'FrontendController@orderway')->name('order.way');