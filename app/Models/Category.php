<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public function mangas()
	{
		return $this->hasMany(Manga::class);
	}
}
