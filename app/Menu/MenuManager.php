<?php 

namespace App\Menu;

use Illuminate\Foundation\Application;
use Config;
use View;
use Route;

class MenuManager {

	protected $app;
	protected $category = ['Admin', 'Web'];
	protected $collection = [];

	public function __construct(Application $app)
	{
		$this->app = $app;
	}

	public function registerCollection()
	{
		foreach ($this->category as $category) {
			$classname = __NAMESPACE__."\\Collection\\".$category.'Menu';

			if (class_exists($classname)) {
				$this->collection[$category] = new $classname;
			}
		}

		return $this;
	}

	public function registerAppMenu($arr_menu)
	{
		foreach ($arr_menu as $section => $menu) {
			$this->registerMenu($menu, $section);
		}

		return $this;
	}

	public function registerMenu($arr_menu, $section)
	{
		if (array_key_exists($section, $this->collection) && is_array($arr_menu)) {
			$parseMenu = $this->parseArrMenu($arr_menu);

			$this->collection[$section]->add($parseMenu);
		}

		return $this;
	}

	public function parseArrMenu($arr_menu)
	{
		$result = [];

		foreach ($arr_menu as $title => $content) {
			$menu = new Menu;
			$menu->html = $title;

			if (is_string($content)) {
				$menu->href = $content;
			} elseif (is_array($content)) {
				if (array_key_exists('is_enable', $content)) $menu->isEnable = $content['is_enable'];
				if (array_key_exists('is_heading', $content)) $menu->isHeading = $content['is_heading'];
				if (array_key_exists('html', $content)) $menu->html = $content['html'];
				if (array_key_exists('href', $content)) $menu->href = $content['href'];

				if (array_key_exists('submenus', $content) && is_array($content['submenus'])) {
					$menu->submenus = $this->parseArrMenu($content['submenus']);
				}
			}

			$result[] = $menu;
		}

		return collect($result);
	}

	public function getViewName($section, $part)
	{
		$viewname = Config::get('menu.view.'.$section.'.'.$part);

		return $viewname;
	}

	public function render($section = 'Admin')
	{
		if (array_key_exists($section, $this->collection)) {
			$result = $this->collection[$section]->render();

			return $result;
		}

		return false;
	}
}
