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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/users','Admin\UserController',['except'=>['show','create','store']]);
Route::post('user/activate/{id}', 'Admin\UserController@activate')->name('activate');
Route::post('user/disable/{id}','Admin\UserController@disable')->name('disable');
Route::post('user/softD/{id}','Admin\UserController@softDestroy')->name('softD');
