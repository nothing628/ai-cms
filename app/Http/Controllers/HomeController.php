<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SEOMeta;
use OpenGraph;
use Twitter;
use Setting;

class HomeController extends Controller
{
	public function index()
	{
		OpenGraph::setDescription(Setting::get('app.description'));
		OpenGraph::setTitle(Setting::get('app.title'));
		OpenGraph::setUrl(route('home'));
		OpenGraph::addProperty('type', 'articles');

		SEOMeta::setTitle(Setting::get('app.title'));
		SEOMeta::setDescription(Setting::get('app.description'));
		SEOMeta::addMeta('robots', 'index,follow');
		SEOMeta::addKeyword(Setting::get('app.keyword'));
		return view('home.index');
	}

	public function search()
	{
		return view('home.search');
	}

	public function contactUs()
	{
		return view('home.contactus');
	}

	public function faq()
	{
		return view('home.faq');
	}
}
