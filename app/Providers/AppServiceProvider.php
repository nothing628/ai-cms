<?php

namespace App\Providers;

use App\Contracts\TaggingUtility;
use App\Tagging\Util;
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
		//
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->register(DownloaderServiceProvider::class);
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
		return [TaggingUtility::class];
	}
}
