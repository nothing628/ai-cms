<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Downloader;

class DownloadController extends Controller
{
    public function download(Request $request) {
    	$url = $request->input('url');
    	$pages_urls = Downloader::listPage($url, 'Animephile');

    	dd($pages_urls);
    }
}
