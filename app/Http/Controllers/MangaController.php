<?php

namespace App\Http\Controllers;

use Auth;
use Image;
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

	public function store(Request $request)
	{
		$meta = [];
		$meta['artist'] = $request->input('artist');
		$meta['author'] = $request->input('author');
		$meta['desc'] = $request->input('desc');

		$manga = new Manga;
		$manga->title = $request->input('title');
		$manga->user_id = Auth::user()->id;
		$manga->meta = $meta;

		if ($request->file('cover')->isValid()) {
			$cover = $request->file('cover');
			$newfilename = snake_case($manga->title . '.' . $cover->extension());
			$path = $cover->move(storage_path('images/cover'), $newfilename);
			
			$manga->cover = $newfilename;
		}

		$manga->save();
		return redirect()->route('admin.manga.index');
	}

	public function edit($manga_id)
	{
		$manga = Manga::find($manga_id);

		if ($manga) {
			return view('admin.manga.edit', ['manga' => $manga]);
		}

		return redirect()->back()->withErrors(['manga' => 'Manga Not Found']);
	}

	public function update($manga_id, Request $request)
	{
		$manga = Manga::find($request->input('manga_id'));
		$meta = [];
		$meta['artist'] = $request->input('artist');
		$meta['author'] = $request->input('author');
		$meta['desc'] = $request->input('desc');

		if ($manga) {
			$manga->title = $request->input('title');
			$manga->user_id = Auth::user()->id;
			$manga->meta = $meta;

			if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
				$cover = $request->file('cover');
				$newfilename = snake_case($manga->title . '.' . $cover->extension());
				$path = $cover->move(storage_path('images/cover'), $newfilename);

				$manga->cover = $newfilename;
			}

			$manga->save();

			return redirect()->route('admin.manga.chapter', $manga->id);
		}

		return redirect()->route('admin.manga.index');
	}

	public function delete($manga_id)
	{
		$manga = Manga::find($manga_id);

		if ($manga) {
			$manga->delete();
		}

		return redirect()->route('admin.manga.index');
	}

	public function mangaChapter($manga_id)
	{
		$manga = Manga::find($manga_id);

		return view('admin.manga.chapter', ['manga' => $manga]);
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
