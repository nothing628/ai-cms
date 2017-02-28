<?php 

Route::group(['prefix' => 'manga', 'as' => 'manga.'], function () {
	Route::get('{manga_slug}', ['as' => 'detail', 'uses' => 'MangaController@detailManga']);
	Route::get('{manga_slug}/{chapter_num}/{page_num?}', ['as' => 'read', 'uses' => 'MangaController@readManga']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::post('upload', ['as' => 'upload', 'uses' => 'UploadController@upload']);
	Route::get('upload', ['as' => 'upload.test', 'uses' => 'UploadController@test']);
});

Route::get('tag', ['as' => 'tag.directory', 'uses' => 'TagController@directory']);
Route::get('browse', ['as' => 'browse', 'uses' => 'MangaController@browseManga']);
Route::get('search', ['as' => 'search', 'uses' => 'HomeController@search']);
Route::get('contact/us', ['as' => 'contact.us', 'uses' => 'HomeController@contactUs']);
Route::get('faq', ['as' => 'faq', 'uses' => 'HomeController@faq']);
Route::get('sitemap.xml', function () {
	$sitemap = App::make("sitemap");
	$sitemap->setCache('laravel.sitemap', 60);

	if ($sitemap->isCached()) {
		$sitemap->add(URL::to('/'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
	}

	return $sitemap->render('xml');
});
