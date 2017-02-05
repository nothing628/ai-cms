<?php 

Route::group(['prefix' => 'v1', 'namespace' => 'v1', 'middleware' => ['auth:api'], 'as' => 'api.'], function () {
	require('user.php');
	require('manga.php');
});
