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
		$result = Category::orderBy('category', 'asc')->paginate(15);
		return response()->json($result);
	}

	public function getSelect()
	{
		$category = Category::all();
		$result = $category->map(function ($value) {
			return ['value' => $value->id, 'key' => $value->category];
		});

		return $result;
	}

	public function store(Request $request)
	{
		try {
			$category = new Category;
			$category->category = $request->category;
			$category->description = $request->description;
			$category->save();

			return response()->json(['success' => true, 'message' => 'Success save category']);
		} catch (Exception $ex) {
			return response()->json(['success' => false, 'message' => $ex->getMessage() ]);
		}
	}
}
