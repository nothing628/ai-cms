<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Downloader;

class DownloadController extends Controller
{
    public function download(Request $request) {
    	$url = $request->input('url');
    	$dest = $request->input('dest');
    	$pages_urls = Downloader::downloadPage($url, $dest, 'Animephile');

    	return response()->json($pages_urls);
    }

    public function listPage(Request $request)
    {
    	$url = $request->input('url');
    	$pages_urls = Downloader::listPage($url, 'Animephile');

    	return response()->json($pages_urls);
    }
}
