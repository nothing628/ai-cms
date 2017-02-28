<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SEOMeta;
use OpenGraph;
use Twitter;
use Setting;
use App\Models\Manga;

class HomeController extends Controller
{
	public function index()
	{
		OpenGraph::setDescription(Setting::get('app.description'));
		OpenGraph::setTitle(Setting::get('app.title'));
		OpenGraph::setUrl(route('home'));
		OpenGraph::addProperty('type', 'articles');

		Twitter::setTitle(Setting::get('app.title'));
		Twitter::setDescription(Setting::get('app.description'));

		SEOMeta::setTitle(Setting::get('app.title'));
		SEOMeta::setDescription(Setting::get('app.description'));
		SEOMeta::addMeta('robots', 'index,follow');
		SEOMeta::addKeyword(Setting::get('app.keyword'));

		$popular = Manga::popular()->limit(15)->get();
		$view = Manga::mostView()->limit(15)->get();
		$random = Manga::random()->limit(15)->get();

		return view('home.index', ['popular' => $popular, 'view' => $view, 'random' => $random]);
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
