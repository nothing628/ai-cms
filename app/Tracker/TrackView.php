<?php

namespace App\Tracker;

use Illuminate\Database\Eloquent\Model;

class TrackView extends Model
{
	public function detail()
	{
		return $this->hasMany(TrackDetail::class);
	}
}
