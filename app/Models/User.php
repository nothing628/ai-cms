<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'fullname', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function activities()
	{
		return $this->hasMany(Activity::class);
	}

	public function bookmarks()
	{
		return $this->hasMany(Bookmark::class);
	}

	public function favorites()
	{
		return $this->hasMany(Favorite::class);
	}
}
