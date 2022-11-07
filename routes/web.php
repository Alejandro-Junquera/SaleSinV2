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

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::namespace('Admin')->prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function(){
    Route::resource('/users','UserController',['except'=>['show','create','store']]);
    Route::post('user/activate/{id}', 'UserController@activate')->name('activate');
    Route::post('user/disable/{id}','UserController@disable')->name('disable');
    Route::post('user/softD/{id}','UserController@softDestroy')->name('softD');
});


