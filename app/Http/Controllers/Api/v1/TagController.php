<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
	public function get()
	{
		return [];
	}

	public function tags()
	{
		$tags = Tag::all();
		$result = $tags->map(function ($value) {
			return ['value' => $value->slug, 'key' => $value->name];
		});

		return response()->json($result);
	}

	public function store(Request $request)
	{
		return response()->json(['success' => true]);
	}
}
