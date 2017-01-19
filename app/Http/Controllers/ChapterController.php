<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;
use App\Models\Chapter;
use App\Models\Page;

class ChapterController extends Controller
{
	public function index($chapter_id)
	{
		$chapter = Chapter::find($chapter_id);

		if ($chapter) {
			return view('admin.chapter.index', ['chapter' => $chapter]);
		}

		return redirect()->back()->withErrors(['chapter' => 'Chapter Not Found']);
	}

	public function create($manga_id)
	{
		$manga = Manga::find($manga_id);

		if ($manga) {
			return view('admin.chapter.create', ['manga' => $manga]);
		}

		return redirect()->back()->withErrors(['manga' => 'Manga Not Found']);
	}

	public function store(Request $request)
	{
		$manga = Manga::find($request->input('manga_id'));

		if ($manga) {
			$chapter = new Chapter;
			$chapter->manga_id = $manga->id;
			$chapter->chapter_title = $request->input('title');
			$chapter->chapter_num = $manga->chapters->count() + 1;

			if ($request->file('cover')->isValid()) {
				$cover = $request->file('cover');
				$newfilename = snake_case($manga->title . '.' . $chapter->chapter_title . '.' . $cover->extension());
				$path = $cover->move(storage_path('images/cover'), $newfilename);

				$chapter->cover = $newfilename;
			}

			$chapter->save();

			return redirect()->route('admin.manga.chapter', $manga->id);
		}

		return redirect()->back()->withErrors(['manga' => 'Manga Not Found']);
	}

	public function delete($chapter_id)
	{
		$chapter = Chapter::find($chapter_id);

		if ($chapter) {
			$manga_id = $chapter->manga_id;
			$chapter->delete();

			return redirect()->route('admin.manga.chapter', $manga_id);
		}

		return redirect()->back()->withErrors(['chapter' => 'Chapter Not Found']);
	}

	public function edit($chapter_id)
	{
		$chapter = Chapter::find($chapter_id);

		if ($chapter) {
			return view('admin.chapter.edit', ['chapter' => $chapter]);
		}

		return redirect()->back()->withErrors(['chapter' => 'Chapter Not Found.']);
	}

	public function update($chapter_id, Request $request)
	{
		$chapter = Chapter::find($chapter_id);

		if ($chapter) {
			//
		}

		return redirect()->back()->withErrors(['Chapter' => 'Chapter Not Found']);
	}
}
