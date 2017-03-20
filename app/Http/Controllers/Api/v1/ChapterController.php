<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manga;
use App\Models\Chapter;
use App\Models\Page;
use DB;

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
			$manga->touch();
			$chapter = new Chapter;
			$chapter->manga_id = $manga->id;
			$chapter->chapter_title = $request->title;
			$chapter->chapter_num = $request->has('chapter_num')?$request->chapter_num:($manga->chapters->count() + 1);
			$chapter->release_at = date('Y-m-d H:i:s');

/*
			if ($request->file('cover')->isValid()) {
				$cover = $request->file('cover');
				$newfilename = str_slug($manga->title) . '_' . $chapter->chapter_title . '.' . $cover->extension();
				$path = $cover->move(storage_path('images/cover'), $newfilename);

				$chapter->cover = $newfilename;
			}
*/
			$chapter->save();

			return response()->json([
				'success' => true,
				'message' => 'Success Save Chapter',
				'redirect_url' => route('admin.chapter.upload', ['chapter_id' => $chapter->id])
			]);
		}

		return response()->json(['success' => false, 'message' => 'Manga Not Found', 'type' => 'error']);
	}

	public function update(Request $request)
	{
		$chapter = Chapter::find($request->id);

		if ($chapter) {
			if ($request->has('pages')) {
				$pages = $request->pages;
				$count_page = $chapter->page;

				foreach ($pages as $index => $page_path) {
					$page = new Page;
					$page->chapter_id = $chapter->id;
					$page->page_num = $index + $count_page + 1;
					$page->path = $page_path;
					$page->save();
				}
			}

			$chapter->save();

			return response()->json([
				'success' => true,
				'message' => 'Success update chapter',
				'redirect_url' => route('admin.manga.chapter', ['manga_id' => $chapter->manga_id])
			]);
		}

		return response()->json(['success' => false, 'message' => 'Chapter Not Found', 'type' => 'error']);
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

	public function order(Request $request)
	{
		$chapter = Chapter::find($request->chapter['id']);
		$position = $request->position;

		if ($chapter) {
			$manga = $chapter->manga;
			$max_num = $manga->chapters->count();
			$last_num = $chapter->chapter_num;
			$target = -1;

			switch ($position) {
				case 'next':
					$target_num = $last_num + 1;
				break;
				case 'first':
					$target_num = 1;
				break;
				case 'prev':
					$target_num = $last_num - 1;
				break;
				case 'last':
					$target_num = $max_num;
				break;
			}

			if ($target_num < 0) $target_num = 1;
			if ($target_num > $max_num) $target_num = $max_num;

			if ($target_num < $last_num) {
				DB::table('chapters')
					->where('manga_id', $manga->id)
					->where('chapter_num', '>=', $target_num)
					->where('chapter_num', '<', $last_num)
					->increment('chapter_num');
			} elseif ($target_num > $last_num) {
				DB::table('chapters')
					->where('manga_id', $manga->id)
					->where('chapter_num', '<=', $target_num)
					->where('chapter_num', '>', $last_num)
					->decrement('chapter_num');
			}

			$chapter->chapter_num = $target_num;
			$chapter->save();
			return response()->json(['success' => true, 'message' => 'Success move chapter']);
		}

		return response()->json(['success' => false, 'message' => 'Chapter Not Moved', 'type' => 'error']);
	}
}
