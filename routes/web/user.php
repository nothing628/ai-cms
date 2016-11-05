<?php

Route::group(['prefix' => 'users', 'as' => 'user.'], function () {
	Route::get('/', ['as' => 'home']);
});