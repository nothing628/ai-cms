<?php 

Route::group(['prefix' => 'manga', 'as' => 'manga.'], function () {
	Route::get('/', ['as' => 'get', 'uses' => 'MangaController@get']);
	Route::post('store', ['as' => 'store', 'uses' => 'MangaController@store']);
	Route::put('update', ['as' => 'update', 'uses' => 'MangaController@update']);
	Route::delete('delete', ['as' => 'delete', 'uses' => 'MangaController@delete']);
});

Route::get('lang/get/select', ['as' => 'lang.get.select', 'uses' => 'MangaController@lang']);
Route::get('category/get/select', ['as' => 'category.get.select', 'uses' => 'CategoryController@getSelect']);

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
	Route::get('/', ['as' => 'get', 'uses' => 'CategoryController@get']);
	Route::post('store', ['as' => 'store', 'uses' => 'CategoryController@store']);
	Route::put('update', ['as' => 'update', 'uses' => 'CategoryController@update']);
	Route::delete('delete', ['as' => 'delete', 'uses' => 'CategoryController@delete']);
});

Route::group(['prefix' => 'tag', 'as' => 'tag.'], function () {
	Route::get('/', ['as' => 'get', 'uses' => 'TagController@get']);
	Route::get('get/select', ['as' => 'get.select', 'uses' => 'TagController@tags']);
	Route::post('store', ['as' => 'store', 'uses' => 'TagController@store']);
	Route::delete('delete', ['as' => 'delete', 'uses' => 'TagController@delete']);
});

Route::group(['prefix' => 'chapter', 'as' => 'chapter.'], function () {
	Route::get('/', ['as' => 'get', 'uses' => 'ChapterController@get']);
	Route::post('store', ['as' => 'store', 'uses' => 'ChapterController@store']);
	Route::post('update', ['as' => 'update', 'uses' => 'ChapterController@update']);
	Route::delete('delete', ['as' => 'delete', 'uses' => 'ChapterController@delete']);
});

Route::group(['prefix' => 'download', 'as' => 'download.'], function () {
	Route::post('/', ['uses' => 'DownloadController@download', 'as' => 'download']);
	Route::post('list', ['uses' => 'DownloadController@listPage', 'as' => 'download.list']);
});

Route::group(['prefix' => 'upload', 'as' => 'upload.'], function () {
	Route::post('page', ['uses' => 'UploadController@page', 'as' => 'page']);
});
