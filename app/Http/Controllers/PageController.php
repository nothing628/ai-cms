<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Page;
use Uuid;

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
