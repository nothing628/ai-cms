<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;
use App\Models\Chapter;
use App\Models\Page;
use SEOMeta;
use Setting;

class ChapterController extends Controller
{
	public function create($manga_id)
	{
		$manga = Manga::find($manga_id);

		if ($manga) {
			return view('admin.chapter.create', ['manga' => $manga]);
		}

		return redirect()->back()->withErrors(['manga' => 'Manga Not Found']);
	}

	public function upload($chapter_id)
	{
		$chapter = Chapter::find($chapter_id);

		if ($chapter) {
			SEOMeta::setTitle(Setting::get('app.name') . ' - Upload Chapter');
			return view('admin.chapter.upload', ['chapter' => $chapter]);
		}
		
		return redirect()->back()->withErrors(['chapter' => 'Chapter Not Found']);
	}
}
