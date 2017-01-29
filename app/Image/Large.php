<?php

namespace App\Image;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Large implements FilterInterface
{
	public function applyFilter(Image $image)
	{
		return $image->resize(null, 720, function ($constraint) {
			$constraint->aspectRatio();
		});
	}
}
