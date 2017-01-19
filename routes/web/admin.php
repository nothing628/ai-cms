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

	Route::get('chapter/create/{manga_id}', ['as' => 'chapter.create', 'uses' => 'ChapterController@create']);
	Route::post('chapter/create/{manga_id}', ['as' => 'chapter.store', 'uses' => 'ChapterController@store']);
	Route::get('chapter/{chapter_id}', ['as' => 'chapter', 'uses' => 'ChapterController@index']);
	Route::get('chapter/{chapter_id}/edit', ['as' => 'chapter.edit', 'uses' => 'ChapterController@edit']);
	Route::post('chapter/{chapter_id}/edit', ['as' => 'chapter.update', 'uses' => 'ChapterController@update']);
	Route::get('chapter/{chapter_id}/delete', ['as' => 'chapter.delete', 'uses' => 'ChapterController@delete']);

	Route::post('page/{chapter_id}', ['as' => 'page.upload', 'uses' => 'PageController@upload']);

	Route::get('category', ['as' => 'category', 'uses' => 'AdminController@category']);
	Route::get('category/create', ['as' => 'category.create', 'uses' => 'CategoryController@create']);
	Route::post('category/create', ['as' => 'category.store', 'uses' => 'CategoryController@store']);
	Route::get('category/edit/{category_id}', ['as' => 'category.edit', 'uses' => 'CategoryController@edit']);
	Route::post('category/edit/{category_id}', ['as' => 'category.update', 'uses' => 'CategoryController@update']);
	Route::get('category/delete/{category_id}', ['as' => 'category.delete', 'uses' => 'CategoryController@delete']);
	Route::get('comment', ['as' => 'comment', 'uses' => 'AdminController@comments']);

	Route::get('setting/page', ['as' => 'setting.page', 'uses' => 'AdminController@setting']);
	Route::get('setting/user', ['as' => 'setting.user', 'uses' => 'AdminController@users']);
});