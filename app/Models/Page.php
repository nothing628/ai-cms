<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	public function Chapter()
	{
		return $this->belongsTo(Chapter::class);
	}

	public function getNextPageAttribute()
	{
		$page = Page::where('chapter_id', $this->chapter_id)->where('page_num', $this->page_num + 1)->get();

		if ($page->count() > 0) {
			return $page->first();
		}

		return new Page();
	}
}
