<?php 

Route::group(['prefix' => 'v1'], function () {
	require('user.php');
});

Route::group(['prefix' => 'download'], function () {
	Route::post('/', ['uses' => 'DownloadController@download', 'as' => 'api.download']);
});
