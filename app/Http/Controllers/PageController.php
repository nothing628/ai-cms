<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;
use App\Models\Chapter;
use App\Models\Page;
use Uuid;
use App;
use Carbon\Carbon;

class PageController extends Controller
{
	public function upload($chapter_id, Request $request)
	{
		$chapter = Chapter::find($chapter_id);

		if ($chapter) {
			return view('admin.chapter.upload', ['chapter' => $chapter]);
		}

		return redirect()->route('admin.manga.index');
	}

	public function sitemap()
	{
		$carbon = new Carbon;
		$modified_at = $carbon->toIso8601String();

		$sitemap = App::make("sitemap");
		$sitemap->setCache('laravel.sitemap', 60);

		if (!$sitemap->isCached()) {
			$sitemap->add(route('home'), $modified_at, '1.0', 'daily');
			$sitemap->add(route('manga.browse'), $modified_at, '0.9', 'daily');
			$sitemap->add(route('sitemap.xml'), $modified_at, '0.4', 'hourly');
			$sitemap->add(route('contact.us'), $modified_at, '0.1', 'monthly');
			$sitemap->add(route('faq'), $modified_at, '0.1', 'monthly');
			$sitemap->add(route('register'), $modified_at, '0.2', 'monthly');
			$sitemap->add(route('login'), $modified_at, '0.2', 'monthly');
			$sitemap->add(route('search'), $modified_at, '0.5', 'monthly');
			$sitemap->add(route('tag.directory'), $modified_at, '0.8', 'weekly');

			$this->AddSitemapManga($sitemap);
		}

		return $sitemap->render('xml');
	}

	public function AddSitemapManga($sitemap)
	{
		$mangas = Manga::all();

		foreach ($mangas as $manga) {
			$modified_at =(new Carbon)->toIso8601String();

			if (!is_null($manga->updated_at)) {
				$modified_at = $manga->updated_at->toIso8601String();
			}

			$sitemap->add($manga->manga_url, $modified_at, '0.5', 'weekly');
		}
	}

	// public function upload($chapter_id, Request $request)
	// {
	// 	$chapter = Chapter::find($chapter_id);
	// 	$manga = $chapter->manga;
	// 	$path = snake_case($manga->title) . '/' . snake_case($chapter->chapter_title);
	// 	$path_dest = storage_path('manga/' . $path . '/');
	// 	$page_num_start = $chapter->pages->count();

	// 	if ($chapter) {
	// 		$pages = $request->file('page');

	// 		foreach ($pages as $page) {
	// 			if ($page->isValid()) {
	// 				$newfilename = Uuid::generate(4) . '.' . $page->extension();
	// 				$page->move($path_dest, $newfilename);

	// 				$page_model = new Page();
	// 				$page_model->chapter_id = $chapter->id;
	// 				$page_model->page_num = $page_num_start + 1;
	// 				$page_model->path = $path . '/' . $newfilename;
	// 				$page_model->save();

	// 				$page_num_start++;
	// 			} 
	// 		}

	// 		return redirect()->route('admin.chapter.edit', $chapter->id);
	// 	}

	// 	return redirect()->back()->withError(['chapter' => 'Chapter Not Found']);
	// }
}
