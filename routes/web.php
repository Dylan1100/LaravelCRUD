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



Route::get('/', 'PagesController@getWelcome');

Route::resource('catagories', 'CatagoryController');

Route::resource('catagories', 'CatagoryController');
Route::resource('items', 'ItemsController');
Route::get('createItems', 'PagesController@getItemsCreate');


Route::get('create', 'PagesController@getCreate');
Route::post('submit', 'CatagoryController@store');

//Route::patch('users/update', 'UsersController@update');
