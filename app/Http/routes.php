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
Route::get('/dashboard','UsersController@index');
Route::get('/inventory/all','HomeController@search');
Route::get('/login','HomeController@getLogin');
Route::post('/login','HomeController@authenticate');
Route::get('/register','UsersController@create');
Route::post('/register','UsersController@store');

