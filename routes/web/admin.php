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

	Route::get('chapter/{chapter_id}', ['as' => 'chapter', 'uses' => 'ChapterController@index']);
	Route::get('chapter/create/{manga_id}', ['as' => 'chapter.create', 'uses' => 'ChapterController@create']);
	Route::get('chapter/{chapter_id}/edit', ['as' => 'chapter.edit', 'uses' => 'ChapterController@edit']);

	Route::post('page/{chapter_id}', ['as' => 'page.upload', 'uses' => 'PageController@upload']);

	Route::get('tags', ['as' => 'tags', 'uses' => 'TagController@index']);
	Route::get('tags/create', ['as' => 'tags.create', 'uses' => 'TagController@create']);

	Route::get('category', ['as' => 'category', 'uses' => 'CategoryController@admin']);
	Route::get('category/create', ['as' => 'category.create', 'uses' => 'CategoryController@create']);
	Route::post('category/create', ['as' => 'category.store', 'uses' => 'CategoryController@store']);
	Route::get('category/edit/{category_id}', ['as' => 'category.edit', 'uses' => 'CategoryController@edit']);
	Route::post('category/edit/{category_id}', ['as' => 'category.update', 'uses' => 'CategoryController@update']);
	Route::get('category/delete/{category_id}', ['as' => 'category.delete', 'uses' => 'CategoryController@delete']);
	Route::get('comment', ['as' => 'comment', 'uses' => 'AdminController@comments']);

	Route::get('setting/page', ['as' => 'setting.page', 'uses' => 'AdminController@setting']);
	Route::post('setting/page', ['as' => 'setting.page.save', 'uses' => 'AdminController@saveSetting']);
	Route::get('setting/user', ['as' => 'setting.user', 'uses' => 'AdminController@users']);
	Route::get('setting/widget', ['as' => 'setting.widget', 'uses' => 'AdminController@widget']);
});