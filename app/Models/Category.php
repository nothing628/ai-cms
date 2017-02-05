<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $appends = ['total_manga'];

	public function getTotalMangaAttribute()
	{
		return $this->mangas->count();
	}

	public function mangas()
	{
		return $this->hasMany(Manga::class);
	}
}
