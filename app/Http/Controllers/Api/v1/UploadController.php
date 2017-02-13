<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
	public function page(Request $request)
	{
		return response()->json(['success' => true]);
	}
}
