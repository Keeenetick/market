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
Auth::routes();
Route::get('/', 'WelcomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home','HomeController@store')->name('store');
Route::delete('/home/{id}','HomeController@destroy')->name('destroy');
Route::get('/home/{id}','HomeController@show')->name('show');
////////////////////////////////////////////////////////////////////////////////////
Route::group(['middleware' => 'auth', 'middleware' => 'access:admin'], function () {
  // Здесь продолжайте свое творение
  Route::get('dashboard', 'Admin\AdminController@index');
  Route::delete('/dashboard/{id}','Admin\AdminController@destroy')->name('destroyfromadmin');
  Route::post('/dashboard/{id}','Admin\AdminController@published')->name('published');
});