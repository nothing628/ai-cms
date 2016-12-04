<?php 

Route::get('category', ['as' => 'category.list', 'uses' => 'CategoryController@index']);

Route::group(['prefix' => 'manga', 'as' => 'manga.'], function () {
	Route::get('/', ['as' => 'list', 'uses' => 'MangaController@browseManga']);
	Route::get('{manga_id}/chapter', ['as' => 'detail', 'uses' => 'MangaController@detailManga']);
	Route::get('{manga_id}/chapter/{chapter_id}/{page_num}', ['as' => 'read', 'uses' => 'MangaController@readManga']);
});