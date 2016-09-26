<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@index');
Route::post('/','HomeController@index');
//User Routes
Route::get('/dashboard','UsersController@index');
Route::get('/cart/view','HomeController@viewCart');
Route::post('/cart/view','HomeController@checkout');
Route::get('/inventory/all','HomeController@search');
Route::get('/inventory/','HomeController@search');
Route::get('/logout','HomeController@logout');
//Item Routes
Route::get('/item/{id}','ItemsController@show');
Route::post('/cart/add/{id}','HomeController@addToCart');
Route::post('/rating/add','HomeController@addRating');
Route::get('/rating/add','HomeController@addRating');
Route::get('/login','HomeController@getLogin');
Route::post('/login','HomeController@authenticate');
Route::get('/register','UsersController@create');
Route::post('/register','UsersController@store');
//Test Routes
Route::get('/nav',function(){
	return view('partials.nav');
});
