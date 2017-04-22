<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
	public function getPages($chapter_id, Request $request)
	{
		$pages = Page::where('chapter_id', $chapter_id)->get();

		return response()->json(['success' => true, 'data' => $pages]);
	}
}
