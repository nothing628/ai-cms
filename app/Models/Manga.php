<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
	public function chapters()
	{
		return $this->hasMany(Chapter::class);
	}
}
