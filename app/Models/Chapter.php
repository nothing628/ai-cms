<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
	protected $appends = ['page'];

	public function manga()
	{
		return $this->belongsTo(Manga::class);
	}

	public function pages()
	{
		return $this->hasMany(Page::class);
	}

	public function getPageAttribute()
	{
		return $this->pages()->count();
	}
}
