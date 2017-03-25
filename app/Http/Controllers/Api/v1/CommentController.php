<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Manga;
use App\Models\User;
use Auth;

class CommentController extends Controller
{
	public function store(Request $request)
	{
		$manga = Manga::find($request->manga_id);
		$user = Auth::user();

		if ($manga && $user) {
			$comment = new Comment;
			$comment->user_id = $user->id;
			$comment->comment = $request->comment;

			$manga->comments()->save($comment);

			return response()->json([
				'success' => true,
				'message' => 'success add comment',
				'redirect_url' => $request->redirect_url
			]);
		}

		return response()->json([
			'success' => false,
			'message' => 'invalid request format',
			'type' => 'error',
			'title' => 'Invalid Format'
		]);
	}
}
