<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
	protected $casts = [
		'meta' => 'array',
	];

	public function getTotalPageAttribute()
	{
		$page = 0;
		$chapters = $this->chapters;

		foreach ($chapters as $chapter) {
			$page += $chapter->pages->count();
		}
		
		return $page;
	}
	
	public function chapters()
	{
		return $this->hasMany(Chapter::class);
	}
}
