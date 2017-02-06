<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;

class CategoryController extends Controller
{
	public function get()
	{
		//
	}

	public function getSelect()
	{
		$category = Category::all();
		$result = $category->map(function ($value) {
			return ['value' => $value->id, 'key' => $value->category];
		});

		return $result;
	}

	public function tags()
	{
		$tags = Tag::all();
		$result = $tags->map(function ($value) {
			return ['value' => $value->slug, 'key' => $value->name];
		});

		return response()->json($result);
	}
}
