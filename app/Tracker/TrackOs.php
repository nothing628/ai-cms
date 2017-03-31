<?php

namespace App\Tracker;

use Illuminate\Database\Eloquent\Model;

class TrackOs extends Model
{
	protected $table = 'track_os';

	public function detail()
	{
		return $this->belongsTo(TrackDetail::class);
	}
}
