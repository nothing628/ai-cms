<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use SEOMeta;
use OpenGraph;
use Twitter;
use Setting;

class TagController extends Controller
{
	public function __construct()
	{
		SEOMeta::setDescription(Setting::get('app.description'));
		SEOMeta::addMeta('robots', 'index,follow');
		SEOMeta::addKeyword(Setting::get('app.keyword'));
	}

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
    	SEOMeta::setTitle(Setting::get('app.name') . ' - ' . 'Tag and Category Directory');
    	$categories = Category::all();
    	return view('home.tag', ['categories' => $categories]);
    }
}
