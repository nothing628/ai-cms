<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	public $with = ['user'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
