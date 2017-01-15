<?php 

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
	Route::get('/', ['as' => 'home', 'uses' => 'AdminController@index']);
	Route::get('manga', ['as' => 'manga.index', 'uses' => 'AdminController@manga']);
	Route::get('manga/create', ['as' => 'manga.create', 'uses' => 'MangaController@create']);
	Route::post('manga/create', ['as' => 'manga.store', 'uses' => 'MangaController@store']);
	Route::get('manga/edit/{manga_id}', ['as' => 'manga.edit', 'uses' => 'MangaController@edit']);
	Route::post('manga/edit/{manga_id}', ['as' => 'manga.update', 'uses' => 'MangaController@update']);
	Route::get('manga/delete/{manga_id}', ['as' => 'manga.delete', 'uses' => 'MangaController@delete']);

	Route::get('manga/{manga_id}', ['as' => 'manga.chapter', 'uses' => 'MangaController@mangaChapter']);
	Route::get('manga/{manga_id}/chapter/{chapter_num}', ['as' => 'manga.page', 'uses' => 'AdminController@mangaPage']);

	Route::get('category', ['as' => 'category', 'uses' => 'AdminController@category']);
	Route::get('comment', ['as' => 'comment', 'uses' => 'AdminController@comments']);

	Route::get('setting/page', ['as' => 'setting.page', 'uses' => 'AdminController@setting']);
	Route::get('setting/user', ['as' => 'setting.user', 'uses' => 'AdminController@users']);
});