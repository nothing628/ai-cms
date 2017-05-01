<?php

namespace App\Menu\Collection;

use App\Menu\Contracts\IMenuCollection;
use Menu;
use View;

class MenuCollection implements IMenuCollection{
	protected $section;
	protected $menus;

	public function __construct()
	{
		$this->menus = collect();
	}

	public function add($menu)
	{
		$this->menus = $this->menus->merge($menu);

		return $this;
	}

	public function remove($menu)
	{
		return $this;
	}

	public function render()
	{
		$parent = Menu::getViewName($this->section, 'container');
		$view = View::make($parent);
		$html = [];

		foreach ($this->menus as $menu) {
			$viewname = Menu::getViewName($this->section, 'menu');

			$html[] = $menu->render($viewname);
		}

		$view->with('html', collect($html));

		return $view->render();
	}
}
