<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
	protected $table = 'activitys';

	/**
	 * Morph to the tag
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function activity_model()
	{
		return $this->morphTo();
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
