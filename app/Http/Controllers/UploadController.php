<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadManga(Request $request) {
    	//
    }

    public function uploadChapter(Request $request, $manga_id, $chapter_id = null) {
    	//
    }

    public function uploadPage(Request $request, $manga_id, $chapter_id, $page_num) {
    	//
    }
}
