<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Tagging\Util;
use Exception;

class TagController extends Controller
{
	public function get(Request $request)
	{
		$tags = Tag::orderBy('name', 'asc')->paginate(15);
		return response()->json($tags);
	}

	public function tags(Request $request)
	{
		$tags = Tag::orderBy('name', 'asc')->get();
		$result = $tags->map(function ($value) {
			return ['value' => $value->slug, 'key' => $value->name];
		});

		return response()->json($result);
	} 

	public function store(Request $request)
	{
		try {
			$tag = new Tag();
			$tag->slug = Util::slug($request->tag);
			$tag->name = $request->tag;
			$tag->save();

			return response()->json(['success' => true, 'message' => 'Success save tag']);
		} catch (Exception $ex) {
			return response()->json(['success' => false, 'message' => $ex->getMessage() ]);
		}
	}

	public function delete(Request $request)
	{
		$tag = Tag::find($request->id);

		if ($tag) {
			$tag->delete();

			return response()->json(['success' => true, 'message' => 'Success delete tag']);
		}

		return response()->json(['success' => false, 'message' => 'Tag Not Found']);		
	}
}
