<?php

namespace App\Image;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Small implements FilterInterface
{
	public function applyFilter(Image $image)
	{
		return $image->resize(200, null, function ($constraint) {
			$constraint->aspectRatio();
		});
	}
}
