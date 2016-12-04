<?php

Route::group(['prefix' => 'users', 'as' => 'user.'], function () {
	Route::get('/', ['as' => 'home']);
});

Route::get('signin', ['as' => 'signin']);
Route::get('register', ['as' => 'register']);
Route::get('signout', ['as' => 'signout']);
