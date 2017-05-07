<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	public $with = ['user'];
	protected $appends = [
		'username',
		'comment_date',
		'avatar',
	];

	public function getUsernameAttribute()
	{
		return $this->user->username;
	}

	public function getCommentDateAttribute()
	{
		return $this->created_at->diffForHumans();
	}

	public function getAvatarAttribute()
	{
		return url('images/small/' . $this->user->photo);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function mangas()
	{
		return $this->morphedByMany(Manga::class, 'commentable');
	}
}
