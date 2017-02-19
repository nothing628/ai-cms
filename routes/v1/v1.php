<?php 

Route::group(['prefix' => 'v1', 'namespace' => 'v1', 'middleware' => ['auth:api'], 'as' => 'api.'], function () {
	require('manga.php');
});

Route::group(['prefix' => 'v1', 'namespace' => 'v1', 'as' => 'api.'], function () {
	require('noauth.php');
});
