<?php 

namespace App\Menu;

use View;

class Menu {
	public $href = "#";
	public $html = "";
	public $isEnable = true;
	public $isHeading = false;
	public $submenus;

	public function __construct()
	{
		$this->submenus = collect();
	}

	public function render($viewname)
	{
		$view = View::make($viewname, ['menu' => $this]);

		if (!$this->isEnable) return "";
		if ($this->isHasSubmenu()) {
			$data = [];

			foreach ($this->submenus as $menu) {
				$data[] = $menu->render($viewname);
			}

			$view->with('submenus', collect($data));
		}

		return $view->render();
	}

	public function isHasSubmenu()
	{
		return $this->submenus->count() > 0;
	}
}
