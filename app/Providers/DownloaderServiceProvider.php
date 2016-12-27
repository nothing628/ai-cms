<?php 

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use App\Downloader\DownloaderFacade;
use App\Downloader\Downloader;

class DownloaderServiceProvider extends ServiceProvider
{
	public function boot()
	{
		//
	}

	public function register()
	{
		$this->app->bind('manga.download', function ($app) {
			return new Downloader($app);
		});

		$loader = AliasLoader::getInstance();
		$loader->alias('Downloader', DownloaderFacade::class);
	}
}