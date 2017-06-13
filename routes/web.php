<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/',	'HomeController@getHome');

/*Route::get('auth/login', function () {
    return view('auth/login');
});

Route::get('auth/logout', function () {
    return view('auth/logout');
});*/

Route::get('catalog', 'CatalogController@getIndex');

Route::get('catalog/show/{id}', 'CatalogController@getShow');

Route::get('catalog/create', 'CatalogController@getCreate');

Route::get('catalog/edit/{id}', 'CatalogController@getEdit');
Auth::routes();

Route::get('/home', 'HomeController@getHome');

Route::post('catalog/create', 'CatalogController@postCreate');
Route::put('catalog/edit/{id}', 'CatalogController@putEdit');

Route::put('catalog/rent/{id}', 'CatalogController@putRent');
Route::put('catalog/return/{id}', 'CatalogController@putReturn');
Route::delete('catalog/delete/{id}', 'CatalogController@deleteMovie');

