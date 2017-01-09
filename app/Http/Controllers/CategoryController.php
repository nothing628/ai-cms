<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
	public function index()
	{
		$categories = Category::all();
		return view('manga.category', ['categories' => $categories]);
	}
}
