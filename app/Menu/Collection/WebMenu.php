<?php 

namespace App\Menu\Collection;

class WebMenu extends MenuCollection
{
	public function __construct()
	{
		parent::__construct();

		$this->section = 'Web';
	}
}
