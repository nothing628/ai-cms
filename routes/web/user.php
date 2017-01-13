<?php

Route::auth();
Route::get('logout', ['as' => 'logout.get', 'uses' => 'Auth\LoginController@logout']);

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
	Route::get('/',			['as' => 'home', 'uses' => 'UserController@home']);
	Route::get('profile',	['as' => 'profile', 'uses' => 'UserController@profile']);
	Route::get('favorite',	['as' => 'favorite', 'uses' => 'UserController@favorite']);
});
