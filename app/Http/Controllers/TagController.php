<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class TagController extends Controller
{
    public function index()
    {
    	return view('admin.tag.index');
    }

    public function create()
    {
    	return view('admin.tag.create');
    }

    public function directory()
    {
    	$categories = Category::all();
    	return view('home.tag', ['categories' => $categories]);
    }
}
