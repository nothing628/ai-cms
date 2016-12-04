<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
    	return view('admin.index');
    }

    public function mangaIndex() {
    	return view('admin.manga');
    }

    public function mangaChapter($manga_id) {
    	return view('admin.chapter');
    }

    public function mangaPage($manga_id, $chapter_id) {
    	return view('admin.page');
    }

    public function comments() {
    	return view('admin.comments');
    }

    public function setting() {
    	return view('admin.setting');
    }

    public function users() {
    	return view('admin.users');
    }
}
