<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use SEOMeta;
use OpenGraph;
use Twitter;
use Setting;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Category;
use App\Models\Manga;
use App\Models\Chapter;
use App\Models\Page;

class MangaController extends Controller
{
	public function __construct()
	{
		SEOMeta::setDescription(Setting::get('app.description'));
		SEOMeta::addMeta('robots', 'index,follow');
		SEOMeta::addKeyword(Setting::get('app.keyword'));
	}

	public function index()
	{
		return view('manga.index');
	}

	public function admin()
	{
		SEOMeta::setTitle(Setting::get('app.name') . ' - Manga List');
		return view('admin.manga.index');
	}

	public function staffPick()
	{
		return view('admin.manga.staffpick');
	}

	public function crawl()
	{
		return view('admin.manga.crawl.index');
	}

	public function create()
	{
		SEOMeta::setTitle(Setting::get('app.name') . ' - New Manga');
		$categories = Category::all();

		return view('admin.manga.create', ['categories' => $categories]);
	}

	public function edit($manga_id)
	{
		$manga = Manga::find($manga_id);
		$categories = Category::all();

		if ($manga) {
			SEOMeta::setTitle(Setting::get('app.name') . " - Edit Manga - $manga->title ");
			return view('admin.manga.edit', ['manga' => $manga, 'categories' => $categories]);
		}

		return redirect()->back()->withErrors(['manga' => 'Manga Not Found']);
	}

	public function mangaChapter($manga_id)
	{
		$manga = Manga::find($manga_id);

		SEOMeta::setTitle(Setting::get('app.name') . " - Detail Manga - $manga->title ");
		return view('admin.manga.chapter', ['manga' => $manga]);
	}

	public function detailManga($manga_slug)
	{
		try {
			$manga = Manga::where('slug', $manga_slug)->firstOrFail();
			$manga->views++;
			$manga->save();

			SEOMeta::setTitle(Setting::get('app.name') . ' - ' . $manga->title);
			OpenGraph::setTitle(Setting::get('app.name') . ' - ' . $manga->title);
			OpenGraph::setDescription($manga->meta['desc']);
			OpenGraph::addProperty('article:published_time', $manga->created_at);
			OpenGraph::addProperty('article:modified_time', $manga->updated_at);
			OpenGraph::addProperty('type', 'article');
			OpenGraph::addImage($manga->thumb_url);

			return view('manga.detail', ['manga' => $manga]);
		} catch (ModelNotFoundException $ex) {
			return redirect()->route('manga.browse');
		}
	}

	public function readManga($manga_slug, $chapter_num, $page_num = 1)
	{
		try {
			$manga = Manga::where('slug', $manga_slug)->firstOrFail();
			$chapter = $manga->chapters()->where('chapter_num', $chapter_num)->firstOrFail();
			$chapter->views++;
			$chapter->save();
			$page = $chapter->pages()->where('page_num', $page_num)->firstOrFail();

			SEOMeta::setTitle(Setting::get('app.name') . ' - ' . $manga->title . ' - ' . $chapter->chapter_title);

			return view('manga.read', ['manga' => $manga, 'chapter' => $chapter, 'page' => $page]);
		} catch (ModelNotFoundException $ex) {
			return redirect()->route('manga.browse');
		}
	}

	public function browseManga()
	{
		SEOMeta::setTitle(Setting::get('app.name') . " - Search Manga");

		$mangas = Manga::all();
		return view('manga.index', ['mangas' => $mangas]);
	}
}
