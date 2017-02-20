<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Category;
use App\Models\Manga;
use App\Models\Chapter;
use App\Models\Page;

class MangaController extends Controller
{
	public function index()
	{
		return view('manga.index');
	}

	public function admin()
	{
		return view('admin.manga.index');
	}

	public function create()
	{
		$categories = Category::all();

		return view('admin.manga.create', ['categories' => $categories]);
	}

	public function edit($manga_id)
	{
		$manga = Manga::find($manga_id);
		$categories = Category::all();

		if ($manga) {
			return view('admin.manga.edit', ['manga' => $manga, 'categories' => $categories]);
		}

		return redirect()->back()->withErrors(['manga' => 'Manga Not Found']);
	}

	public function mangaChapter($manga_id)
	{
		$manga = Manga::find($manga_id);

		return view('admin.manga.chapter', ['manga' => $manga]);
	}

	public function detailManga($manga_slug)
	{
		try {
			$manga = Manga::where('slug', $manga_slug)->firstOrFail();

			return view('manga.chapter', ['manga' => $manga]);
		} catch (ModelNotFoundException $ex) {
			return redirect()->route('manga.list');
		}
	}

	public function readManga($manga_slug, $chapter_num, $page_num = 1)
	{
		try {
			$manga = Manga::where('slug', $manga_slug)->firstOrFail();
			$chapter = $manga->chapters()->where('chapter_num', $chapter_num)->firstOrFail();
			$page = $chapter->pages()->where('page_num', $page_num)->firstOrFail();

			return view('manga.read', ['manga' => $manga, 'chapter' => $chapter, 'page' => $page]);
		} catch (ModelNotFoundException $ex) {
			return redirect()->route('manga.list');
		}
	}

	public function browseManga()
	{
		$mangas = Manga::all();
		return view('manga.index', ['mangas' => $mangas]);
	}
}
