<?php

namespace App\Tracker;

use Illuminate\Database\Eloquent\Model;

class TrackBrowser extends Model
{
	public function detail()
	{
		return $this->hasMany(TrackDetail::class);
	}
}
