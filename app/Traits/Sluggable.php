<?php 

namespace App\Traits;

trait Sluggable
{
	public static function boot()
	{
		static::saving(function ($model) {
			echo "Is saving";
		});
	}
}
