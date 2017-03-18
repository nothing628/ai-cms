<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use SEOMeta;

class CategoryController extends Controller
{
	public function __construct()
	{
		//
	}

	public function admin()
	{
		SEOMeta::setTitle('AI-CMS Admin - Category List');
		
		return view('admin.category.index');
	}
}
