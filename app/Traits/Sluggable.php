<?php 

namespace App\Traits;

use Slugify;
use Exception;

trait Sluggable
{
	public function __construct(array $attributes = [])
	{
		parent::__construct($attributes);

		$slug_field = property_exists($this, 'slug_field')?$this->slug_field:'slug';
		$slug_source = property_exists($this, 'slug_source')?$this->slug_source:null;
		//$slug_max_length = property_exists($this, 'slug_max_length')?$this->slug_max_length:64;

		if (is_null($slug_source)) {
			throw new Exception("Your class need to add property slug_source", 1);
		}
	}

	public static function boot()
	{
		static::saving(function ($model) {
			$slug = $model->slug;

			return true;
		});
	}

	public function setSlugAttribute($value)
	{
		$slug_field = property_exists($this, 'slug_field')?$this->slug_field:'slug';
		$this->attributes[$slug_field] = $value;

		return $this;
	}

	public function getSlugAttribute()
	{
		$slug_field = property_exists($this, 'slug_field')?$this->slug_field:'slug';
		$slug = $this->getAttributeFromArray($slug_field);

		if (is_null($slug) || !$this->exists) {
			$slug = $this->generateSlug();
		}

		return $slug;
	}

	protected function generateSlug()
	{
		$slug_source = $this->slug_source;
		//$slug_max_length = property_exists($this, 'slug_max_length')?$this->slug_max_length:64;
		$slug_field = property_exists($this, 'slug_field')?$this->slug_field:'slug';

		$source = $this->{$slug_source};
		$slug = Slugify::slugify($source);
		$counter = 1;

		while ($this->isSlugExists($slug)) {
			//Find slug .
			$counter_str = "-" . $counter;
			$slug = substr($slug, 0, -(strlen($counter_str)));

			$counter++;
		}

		$this->attributes[$slug_field] = $slug;

		return $slug;
	}

	protected function isSlugExists($slug)
	{
		$slug_field = property_exists($this, 'slug_field')?$this->slug_field:'slug';

		$class = get_class($this);
		$is_exists = $class::where($slug_field, $slug)->get()->count();

		return ($is_exists > 0);
	}
}
