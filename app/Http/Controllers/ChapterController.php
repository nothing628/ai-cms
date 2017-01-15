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
		return view('admin.chapter.index');
	}

	public function create($manga_id)
	{
		$manga = Manga::find($manga_id);

		if ($manga) {
			return view('admin.chapter.create');
		}

		return redirect()->back()->withErrors(['manga' => 'Manga Not Found']);
	}

	public function edit($chapter_id)
	{
		return view('admin.chapter.edit');
	}
}
