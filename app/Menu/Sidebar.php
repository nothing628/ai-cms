<?php 

namespace App\Menu;

use View;
use Route;

class Sidebar
{
	protected $app;
	protected $registered_menus = [];

	public function __construct($app)
	{
		$this->app = $app;
		$this->loadConfig();
	}

	public function loadConfig()
	{
		$menus = $this->app->config->get('menu');
		$this->registered_menus = $this->registerMenu($menus);
	}

	public function registerMenu($array_menu)
	{
		$temp = [];
		foreach ($array_menu as $title => $arr) {
			$menu = new Menu;
			$menu->title = $title;

			if (is_string($arr)) {
				$menu->href = (Route::has($arr))?route($arr):url($arr);
			} elseif (is_array($arr)) {
				$menu->isHeading = (array_key_exists('heading', $arr))?$arr['heading']:false;
				$menu->icon = (array_key_exists('icon', $arr))?$arr['icon']:'';
				$menu->href = (array_key_exists('href', $arr))?$arr['href']:'#';
				$menu->href = (Route::has($menu->href))?route($menu->href):url($menu->href);

				if (array_key_exists('submenu', $arr) && is_array($arr['submenu'])) {
					$menu->submenu = $this->registerMenu($arr['submenu']);
				}
			}

			$temp[] = $menu;
		}

		return $temp;
	}

	public function render()
	{
		$html = [];

		foreach ($this->registered_menus as $menu) {
			$html[] = $menu->render();
		}

		$view = View::make('layouts.menu.parent', ['menus' => implode(' ', $html)]);

		return $view->render();
	}
}
