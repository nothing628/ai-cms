<?php 

namespace App\Menu;

use View;

class Menu {
	public $href = '';
	public $title = '';
	public $icon = '';
	public $isRaw = false;
	public $isHeading = false;
	public $submenu = [];

	public function hasSubmenu()
	{
		return count($this->submenu) > 0;
	}

	public function __get($key)
	{
		switch ($key) {
			case 'submenus':
				return $this->submenu;
				break;
			default:
				# code...
				break;
		}
	}

	public function render()
	{
		if ($this->isHeading) {
			$view = View::make('layouts.menu.heading', ['menu' => $this]);
			return $view->render();
		} else {
			$view = View::make('layouts.menu.menu', ['menu' => $this]);
			return $view->render();
		}
	}
}
