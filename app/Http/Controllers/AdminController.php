<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;
use Setting;
use SEOMeta;

class AdminController extends Controller
{
	public function __construct()
	{
		SEOMeta::addMeta('robots', 'noindex,nofollow');
		SEOMeta::addKeyword(Setting::get('app.keyword'));
	}

	public function index() {
		return view('admin.index');
	}

	public function mangaPage($manga_id, $chapter_num)
	{
		return view('admin.page');
	}

	public function comments() {
		return view('admin.comments');
	}

	public function setting()
	{
		return view('admin.setting.page');
	}

	public function widget()
	{
		SEOMeta::setTitle(Setting::get('app.name') . ' - Widget');
		return view('admin.setting.widget');
	}

	public function saveSetting(Request $request)
	{
		Setting::set('app.name', $request->input('app_name'));
		Setting::set('app.desc', $request->input('app_desc'));
		Setting::save();

		return redirect()->route('admin.setting.page');
	}

	public function users() {
		SEOMeta::setTitle(Setting::get('app.name') . ' - Users');
		return view('admin.setting.users');
	}
}
