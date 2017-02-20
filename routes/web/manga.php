<?php 

Route::get('category', ['as' => 'category.list', 'uses' => 'CategoryController@index']);

Route::group(['prefix' => 'manga', 'as' => 'manga.'], function () {
	Route::get('/', ['as' => 'list', 'uses' => 'MangaController@browseManga']);
	Route::get('{manga_id}', ['as' => 'detail', 'uses' => 'MangaController@detailManga']);
	Route::get('{manga_id}/{chapter_id}/{page_num?}', ['as' => 'read', 'uses' => 'MangaController@readManga']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::post('upload', ['as' => 'upload', 'uses' => 'UploadController@upload']);
	Route::get('upload', ['as' => 'upload.test', 'uses' => 'UploadController@test']);
});

Route::get('contact/us', ['as' => 'contact.us', 'uses' => 'HomeController@contactUs']);
