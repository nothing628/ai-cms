<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Downloader\DownloaderFacade;

class DownloadController extends Controller
{
	public function download(Request $request)
	{
		$url = $request->url;
		$dest = $request->dest;
	}
}
