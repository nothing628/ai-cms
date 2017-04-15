<?php 

Route::group(['prefix' => 'v1', 'namespace' => 'v1', 'middleware' => ['auth:api'], 'as' => 'api.'], function () {
	require('withauth.php');
});

Route::group(['prefix' => 'v1', 'namespace' => 'v1', 'as' => 'api.'], function () {
	require('noauth.php');
});
