<?php

namespace App\Models;

use App\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
	use Taggable;

	protected $appends = [
		'total_page',
		'status',
		'rating',
		'rating_by',
	];

	protected $casts = [
		'meta' => 'array',
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function ratings()
	{
		return $this->hasMany(Rating::class);
	}

	public function getRatingAttribute()
	{
		$ratings = $this->ratings;
		$avg = $ratings->avg('rating');

		if (is_null($avg)) $avg = 0;

		return $avg;
	}

	public function getRatingByAttribute()
	{
		return $this->ratings->count();
	}

	public function getStatusAttribute()
	{
		if ($this->is_completed) {
			return '<span class=\'label label-success\'>Completed</span>';
		} else {
			return '<span class=\'label label-warning\'>On Going</span>';
		}
	}

	public function getTotalPageAttribute()
	{
		$page = 0;
		$chapters = $this->chapters;

		foreach ($chapters as $chapter) {
			$page += $chapter->pages->count();
		}
		
		return $page;
	}
	
	public function chapters()
	{
		return $this->hasMany(Chapter::class);
	}

	public function scopeMostView($query, $take = 20)
	{
		return $query->orderBy('view', 'desc')->limit($take);
	}

	public function scopePopular($query, $take = 20)
	{
		return $query->limit($take);
	}

	public function scopeRecent($query, $take = 20)
	{
		return $query->latest()->limit($take);
	}

	public function scopeRandom($query, $take = 20)
	{
		return $query->orderBy(DB::raw('RAND()'))->limit($take);
	}
}
