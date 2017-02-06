<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manga;
use App\Models\Language;

class MangaController extends Controller
{
	public function get(Request $request)
	{
		$manga = Manga::all();

		return response()->json($manga);
	}

    public function store(Request $request)
	{
		$meta = [];
		$meta['artist'] = $request->input('artist');
		$meta['author'] = $request->input('author');
		$meta['desc'] = $request->input('desc');

		$manga = new Manga;
		$manga->title = $request->input('title');
		$manga->category_id = $request->input('category_id');
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

	public function update($manga_id, Request $request)
	{
		$manga = Manga::find($request->input('manga_id'));
		$meta = [];
		$meta['artist'] = $request->input('artist');
		$meta['author'] = $request->input('author');
		$meta['desc'] = $request->input('desc');

		if ($manga) {
			$manga->title = $request->input('title');
			$manga->category_id = $request->input('category_id');
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

	public function lang()
	{
		$languages = Language::all();
		$response = $languages->map(function ($value) {
			return ['value' => $value->id, 'key' => $value->lang];
		});

		return response()->json($response);
	}
}
