<?php 

Route::group(['prefix' => 'v1', 'namespace' => 'v1', 'middleware' => ['auth:api']], function () {
	require('user.php');
	require('manga.php');
});
