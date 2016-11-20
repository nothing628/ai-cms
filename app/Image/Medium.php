<?php

namespace App\Image;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Medium implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(240, null, function ($constraint) {
        	$constraint->aspectRatio();
        });
    }
}