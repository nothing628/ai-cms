<?php 

Route::group(['prefix' => 'manga', 'as' => 'manga.'], function () {
	Route::get('/', ['as' => 'get', 'uses' => 'MangaController@get']);
	Route::get('read', ['as' => 'read', 'uses' => 'MangaController@read']);
});
