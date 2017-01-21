<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;
use Setting;

class AdminController extends Controller
{
	public function index() {
		return view('admin.index');
	}

	public function manga()
	{
		$mangas = Manga::all();
		return view('admin.manga', ['mangas' => $mangas]);
	}

	public function mangaPage($manga_id, $chapter_num) {
		return view('admin.page');
	}

	public function category()
	{
		return view('admin.category');
	}

	public function comments() {
		return view('admin.comments');
	}

	public function setting()
	{
		return view('admin.setting');
	}

	public function saveSetting(Request $request)
	{
		Setting::set('app.name', $request->input('app_name'));
		Setting::set('app.desc', $request->input('app_desc'));
		Setting::save();

		return redirect()->route('admin.setting.page');
	}

	public function users() {
		return view('admin.users');
	}
}
