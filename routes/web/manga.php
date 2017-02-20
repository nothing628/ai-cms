<?php 

Route::get('category', ['as' => 'category.list', 'uses' => 'CategoryController@index']);

Route::group(['prefix' => 'manga', 'as' => 'manga.'], function () {
	Route::get('/', ['as' => 'list', 'uses' => 'MangaController@browseManga']);
	Route::get('{manga_slug}', ['as' => 'detail', 'uses' => 'MangaController@detailManga']);
	Route::get('{manga_slug}/{chapter_num}/{page_num?}', ['as' => 'read', 'uses' => 'MangaController@readManga']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::post('upload', ['as' => 'upload', 'uses' => 'UploadController@upload']);
	Route::get('upload', ['as' => 'upload.test', 'uses' => 'UploadController@test']);
});

Route::get('contact/us', ['as' => 'contact.us', 'uses' => 'HomeController@contactUs']);
