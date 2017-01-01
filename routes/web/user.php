<?php

Route::auth();

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
	Route::get('/',			['as' => 'home', 'uses' => 'UserController@home']);
	Route::get('profile',	['as' => 'profile', 'uses' => 'UserController@profile']);
	Route::get('favorite',	['as' => 'favorite', 'uses' => 'UserController@favorite']);
});
