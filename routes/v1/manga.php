<?php 

Route::group(['prefix' => 'manga', 'as' => 'manga.'], function () {
	Route::get('/', ['as' => 'get', 'uses' => 'MangaController@get']);
	Route::post('store', ['as' => 'store', 'uses' => 'MangaController@store']);
	Route::put('update', ['as' => 'update', 'uses' => 'MangaController@update']);
	Route::delete('delete', ['as' => 'delete', 'uses' => 'MangaController@delete']);
});

Route::group(['prefix' => 'chapter', 'as' => 'chapter.'], function () {
	Route::post('store', ['as' => 'store', 'uses' => 'ChapterController@store']);
	Route::put('update', ['as' => 'update', 'uses' => 'ChapterController@update']);
	Route::delete('delete', ['as' => 'delete', 'uses' => 'ChapterController@delete']);
});

Route::group(['prefix' => 'download', 'as' => 'download.'], function () {
	Route::post('/', ['uses' => 'DownloadController@download', 'as' => 'download']);
	Route::post('list', ['uses' => 'DownloadController@listPage', 'as' => 'download.list']);
});
