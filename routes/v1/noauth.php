<?php 

Route::group(['prefix' => 'manga', 'as' => 'manga.'], function () {
	Route::get('/', ['as' => 'get', 'uses' => 'MangaController@get']);
	Route::get('search', ['as' => 'search', 'uses' => 'MangaController@search']);
	Route::get('read', ['as' => 'read', 'uses' => 'MangaController@read']);
});

Route::group(['prefix' => 'down', 'as' => 'down.'], function () {
	Route::post('/', ['uses' => 'DownloadController@download', 'as' => 'download']);
	Route::post('list', ['uses' => 'DownloadController@listPage', 'as' => 'download.list']);
});
