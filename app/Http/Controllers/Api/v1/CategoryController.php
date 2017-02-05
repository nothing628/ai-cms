<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
	public function get(Request $request)
	{
		$categories = Category::all();

		return response()->json($categories);
	}
}
