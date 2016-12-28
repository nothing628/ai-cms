<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	public function Chapter()
	{
		return $this->belongsTo(Chapter::class);
	}
}
