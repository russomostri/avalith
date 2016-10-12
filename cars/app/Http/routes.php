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



Route::auth();


Route::group(['middleware' => ['usertype:vendedor|admin']], function(){
	
	Route::get('car','CarController@Index');
	
	Route::group(['middleware' => ['usertype:admin']] , function(){
		//Route::get('car','CarController@Index');
		//Route::resource('car','CarController');
		Route::resource('brand','BrandController');
		Route::get('car/create','CarController@create');
	});
});


Route::get('/', 'HomeController@index');

/*

Route::group(['middleware' => 'salesman'], function(){
	
	Route::get('car','CarController@Index');
	
});

Route::group(['middleware' => 'admin'] , function(){
	//Route::get('car','CarController@Index');
	Route::resource('car','CarController');
	Route::resource('brand','BrandController');
});

*/