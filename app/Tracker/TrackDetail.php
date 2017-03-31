<?php

namespace App\Tracker;

use Illuminate\Database\Eloquent\Model;

class TrackDetail extends Model
{
	public function browser()
	{
		return $this->belongsTo(TrackBrowser::class, 'track_browser_id');
	}

	public function os()
	{
		return $this->belongsTo(TrackOs::class, 'track_os_id');
	}

	public function view()
	{
		return $this->belongsTo(TrackView::class, 'track_view_id');
	}
}
