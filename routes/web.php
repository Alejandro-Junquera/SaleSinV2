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

Route::get('email/verify/{id}','Auth\VerificationController@verifyx')->name('verification.verify');
Route::get('/home', 'HomeController@index')->name('home');
Route::namespace('Admin')->prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function(){
    Route::resource('/users','UserController',['except'=>['show','create','store']]);
    Route::resource('/articles','ArticleController');
    Route::post('article/softD/{id}','ArticleController@softDestroy')->name('articleSoftD');
    Route::post('user/activate/{id}', 'UserController@activate')->name('activate');
    Route::post('user/disable/{id}','UserController@disable')->name('disable');
    Route::post('user/softD/{id}','UserController@softDestroy')->name('softD');
});
Route::namespace('User')->prefix('user')->middleware(['auth','auth.user'])->name('user.')->group(function(){
    Route::resource('/offers','OffersController');
});
Route::name('imprimir')->get('/imprimir-pdf', 'Controller@imprimir');


