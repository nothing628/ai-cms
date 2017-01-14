<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Manga;
use App\Models\Chapter;
use App\Models\Page;

class MangaController extends Controller
{
	public function index()
	{
		return view('manga.index');
	}

	public function create()
	{
		return view('admin.manga.create');
	}

	public function detailManga($manga_id)
	{
		try {
			$manga = Manga::findOrFail($manga_id);
			return view('manga.chapter', ['manga' => $manga]);
		} catch (ModelNotFoundException $ex) {
			return redirect()->route('manga.list');
		}
	}

	public function readManga($manga_id, $chapter_id, $page_num = 1)
	{
		try {
			$chapter = Chapter::where('chapter_num', $chapter_id)->where('manga_id', $manga_id)->firstOrFail();
			$page = Page::where('chapter_id', $chapter->id)->where('page_num', $page_num)->firstOrFail();

			return view('manga.read', ['chapter' => $chapter, 'page' => $page]);
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
