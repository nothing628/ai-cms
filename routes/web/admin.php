<?php 

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
	Route::get('/', ['as' => 'home']);
});