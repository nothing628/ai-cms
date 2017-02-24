<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	protected $appends = ['page_url'];

	public function Chapter()
	{
		return $this->belongsTo(Chapter::class);
	}

	public function getPageUrlAttribute()
	{
		$path_image = $this->path;

		return url('images/original/' . $path_image);
	}
}
