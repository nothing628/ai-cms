<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Setting;
use SEOMeta;

class ReportController extends Controller
{
	public function __construct()
	{
		SEOMeta::addMeta('robots', 'index,follow');
	}

	public function page()
	{
		SEOMeta::setTitle(Setting::get('app.name') . ' - Report Page Views');
		return view('admin.report.page');
	}

	public function manga()
	{
		SEOMeta::setTitle(Setting::get('app.name') . ' - Report Manga');
		return view('admin.report.manga');
	}

	public function upload()
	{
		return response()->json([]);
	}

	public function search()
	{
		return response()->json([]);
	}
}
