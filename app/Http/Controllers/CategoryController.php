<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
	public function admin()
	{
		return view('admin.category.index');
	}

	public function create()
	{
		return view('admin.category.create');
	}

	public function store(Request $request)
	{
		$category = new Category;

		return redirect()->route('admin.category');
	}

	public function edit($category_id)
	{
		$category = Category::find($category_id);

		if ($category) {
			//
		}

		return redirect()->back()->withErrors(['category' => 'Category Not Found.']);
	}

	public function update($category_id, Request $request) 
	{
		$category = Category::find($category_id);

		if ($category) {
			$category->save();
		}

		return redirect()->route('admin.category');
	}

	public function delete($category_id)
	{
		$category = Category::find($category_id);

		if ($category) {
			$category->delete();
		}

		return redirect()->route('admin.category');
	}
}
