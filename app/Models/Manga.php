<?php

namespace App\Models;

use App\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use DB;

class Manga extends Model
{
	use Taggable;

	protected $appends = [
		'total_page',
		'status',
		'rating',
		'rating_by',
		'thumb_url',
	];

	protected $casts = [
		'meta' => 'array',
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function chapters()
	{
		return $this->hasMany(Chapter::class);
	}

	public function ratings()
	{
		return $this->hasMany(Rating::class);
	}

	public function getCategoryNameAttribute()
	{
		$category = $this->category;

		return $category->category;
	}

	public function getUploaderAttribute()
	{
		$user = $this->user;

		return $user->username;
	}

	public function getThumbUrlAttribute()
	{
		return url('images/medium/' . $this->cover);
	}

	public function getRatingAttribute()
	{
		$ratings = $this->ratings()->get();
		$avg = $ratings->avg('rating');

		if (is_null($avg)) $avg = 0;

		return $avg;
	}

	public function getRatingByAttribute()
	{
		return $this->ratings()->get()->count();
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
		$chapters = $this->chapters()->get();

		foreach ($chapters as $chapter) {
			$page += $chapter->pages->count();
		}
		
		return $page;
	}

	public function scopeWithCategory($query)
	{
		return $query->with('category', 'user');
	}

	public function scopeMostView($query)
	{
		return $this->scopeWithCategory($query)->orderBy('views', 'desc');
	}

	public function scopePopular($query)
	{
		return $this->scopeWithCategory($query);
	}

	public function scopeRecent($query)
	{
		return $this->scopeWithCategory($query)->latest();
	}

	public function scopeRandom($query)
	{
		return $this->scopeWithCategory($query)->orderBy(DB::raw('RAND()'));
	}
}
