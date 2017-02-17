<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manga;
use App\Models\Chapter;

class ChapterController extends Controller
{
	public function get(Request $request)
	{
		$chapter = Chapter::where('manga_id', $request->manga_id)->orderBy('chapter_num', 'desc')->paginate(15);

		return response()->json($chapter);
	}

	public function store(Request $request)
	{
		$manga = Manga::find($request->manga_id);

		if ($manga) {
			$chapter = new Chapter;
			$chapter->manga_id = $manga->id;
			$chapter->chapter_title = $request->title;
			$chapter->chapter_num = $request->has('chapter_num')?$request->chapter_num:($manga->chapters->count() + 1);
			$chapter->release_at = date("Y-m-d");

			if ($request->file('cover')->isValid()) {
				$cover = $request->file('cover');
				$newfilename = str_slug($manga->title) . '_' . $chapter->chapter_title . '.' . $cover->extension();
				$path = $cover->move(storage_path('images/cover'), $newfilename);

				$chapter->cover = $newfilename;
			}

			$chapter->save();

			return response()->json(['success' => true, 'message' => 'Success Save Chapter', 'redirect_url' => route('admin.manga.chapter', ['manga_id' => $manga->id])]);
		}

		return response()->json(['success' => false, 'message' => 'Manga Not Found', 'type' => 'error']);
	}

	public function delete(Request $request)
	{
		$chapter = Chapter::find($request->id);

		if ($chapter) {
			$chapter->delete();

			return response()->json(['success' => true, 'message' => 'Success delete chapter']);
		}

		return response()->json(['success' => false, 'message' => 'Chapter Not Found', 'type' => 'error']);
	}
}
