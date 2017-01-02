<?php 

Route::group(['prefix' => 'v1'], function () {
	require('user.php');
});

Route::group(['prefix' => 'download', 'as' => 'api.'], function () {
	Route::post('/', ['uses' => 'DownloadController@download', 'as' => 'download']);
	Route::post('list', ['uses' => 'DownloadController@listPage', 'as' => 'download.list']);
});
