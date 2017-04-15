<?php 

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
	Route::get('/', ['as' => 'home', 'uses' => 'AdminController@index']);

	Route::get('test', function () {return view('test');});

	Route::get('manga', ['as' => 'manga.index', 'uses' => 'MangaController@admin']);
	Route::get('manga/create', ['as' => 'manga.create', 'uses' => 'MangaController@create']);
	Route::get('manga/edit/{manga_id}', ['as' => 'manga.edit', 'uses' => 'MangaController@edit']);

	Route::get('manga/staff_pick', ['as' => 'manga.staff', 'uses' => 'MangaController@staffPick']);
	Route::get('manga/crawl', ['as' => 'manga.crawl', 'uses' => 'MangaController@crawl']);

	Route::get('manga/{manga_id?}', ['as' => 'manga.chapter', 'uses' => 'MangaController@mangaChapter']);
	Route::get('manga/{manga_id}/chapter/{chapter_num}', ['as' => 'manga.page', 'uses' => 'AdminController@mangaPage']);

	Route::get('chapter/create/{manga_id}', ['as' => 'chapter.create', 'uses' => 'ChapterController@create']);
	Route::get('chapter/upload/{chapter_id?}', ['as' => 'chapter.upload', 'uses' => 'ChapterController@upload']);

	Route::get('tags', ['as' => 'tags', 'uses' => 'TagController@index']);
	Route::get('category', ['as' => 'category', 'uses' => 'CategoryController@admin']);

	Route::get('comment', ['as' => 'comment', 'uses' => 'AdminController@comments']);

	Route::get('setting/page', ['as' => 'setting.page', 'uses' => 'AdminController@setting']);
	Route::post('setting/page', ['as' => 'setting.page.save', 'uses' => 'AdminController@saveSetting']);
	Route::get('setting/user', ['as' => 'setting.user', 'uses' => 'AdminController@users']);
	Route::get('setting/widget', ['as' => 'setting.widget', 'uses' => 'AdminController@widget']);

	Route::group(['prefix' => 'report', 'as' => 'report.'], function () {
		Route::get('page', ['uses' => 'ReportController@page', 'as' => 'page']);
		Route::get('manga', ['uses' => 'ReportController@manga', 'as' => 'manga']);
		Route::get('upload', ['uses' => 'ReportController@upload', 'as' => 'upload']);
		Route::get('search', ['uses' => 'ReportController@search', 'as' => 'search']);
	});
});