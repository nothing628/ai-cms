<?php

namespace App\Providers;

use App\Menu\MenuManager;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
	/**
	 * @var bool Indicates if loading of the provider is deferred.
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->app['menu.manager']->registerCollection();
		$this->app['menu.manager']->registerAppMenu(require __DIR__.'/../menu.php');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('menu.manager', function ($app) {
			return new MenuManager($app);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return string
	 */
	public function provides()
	{
		return ['menu.manager'];
	}
}
