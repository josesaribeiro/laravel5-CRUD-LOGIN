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

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);


Route::group(['middleware' => 'auth'], function(){
    Route::resource('tasks', 'TasksController');
    Route::get('documents/download/{id}', 'DocumentsController@download')->name('documents.download');
    Route::resource('documents', 'DocumentsController');
    Route::get('poders/download/{id}', 'PodersController@download')->name('poders.download');
    Route::resource('poders', 'PodersController');
});

Route::get('hello', 'Hello@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

