<?php

namespace App\Providers;

use App\Contracts\TaggingUtility;
use App\Models\Tag;
use App\Observers\TagObserver;
use App\Tagging\Util;
use App\Menu\Sidebar;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Tag::observe(TagObserver::class);
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->register(DownloaderServiceProvider::class);
		$this->app->singleton('menu.manager', function () {
			return new Sidebar($this->app);
		});
		$this->app->singleton(TaggingUtility::class, function () {
			return new Util;
		});
	}

	/**
	 * (non-PHPdoc)
	 * @see \Illuminate\Support\ServiceProvider::provides()
	 */
	public function provides()
	{
		return [
			TaggingUtility::class,
			Sidebar::class,
		];
	}
}
