<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use File;

class Page extends Model
{
	protected $appends = ['page_url', 'thumb_url'];

	public static function boot()
	{
		parent::boot();
		static::deleting(function ($model) {
			$path = storage_path('manga/' . $model->path);

			if (File::exists($path)) {
				File::delete($path);
			}
		});
	}

	public function Chapter()
	{
		return $this->belongsTo(Chapter::class);
	}

	public function getPageUrlAttribute()
	{
		$path_image = $this->path;

		return url('images/original/' . $path_image);
	}

	public function getThumbUrlAttribute()
	{
		$path_image = $this->path;

		return url('images/small/' . $path_image);
	}
}
