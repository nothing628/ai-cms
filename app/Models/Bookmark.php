<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
	public function manga()
	{
		return $this->belongsTo(Manga::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
