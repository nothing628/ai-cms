<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SEOMeta;
use SEO;
use Setting;

class HomeController extends Controller
{
	public function index()
	{
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
