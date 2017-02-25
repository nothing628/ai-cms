<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
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
